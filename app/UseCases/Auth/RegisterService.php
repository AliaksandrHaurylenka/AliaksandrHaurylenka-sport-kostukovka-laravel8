<?php

namespace App\UseCases\Auth;

use App\Models\Subscribe;
use App\Http\Requests\SubscribesRequest;
use App\Mail\SubscribesEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Mail\Mailer;


class RegisterService
{

    private $mailer;
    private $dispatcher;

    public function __construct(Mailer $mailer, Dispatcher $dispatcher)
    {
        $this->mailer = $mailer;
        $this->dispatcher = $dispatcher;
    }

    public function register(SubscribesRequest $request): void
    {
        $subscribe = Subscribe::register_subscriber(
            $request['email']
        );

        $this->mailer->to($subscribe->email)->send(new SubscribesEmail($subscribe));
        $this->dispatcher->dispatch(new Registered($subscribe));
    }

    public function verify($id): void
    {
        // dd($id);
        $subscribe = Subscribe::findOrFail($id);
        $subscribe->verify();
    }
}