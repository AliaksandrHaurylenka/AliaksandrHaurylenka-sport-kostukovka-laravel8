<?php

namespace App\Http\Controllers;

use App\Mail\SubscribesEmail;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SubscribesRequest;

class SubscribesController extends Controller
{

    public function subscribe(SubscribesRequest $request)
    {
		$subscriber = Subscribe::register_subscriber(
			$request['email']
		);

        Mail::to($subscriber)->send(new SubscribesEmail($subscriber));

        flash('Для подтверждения рассылок, пожалуйста, перейдите в свою почту!')->success()->important();
        return redirect()->back();
    }


    public function verify($token)
    {
        $subs = Subscribe::where('token', $token)->firstOrFail();
        $subs->token = null;
        $subs->save();

        flash('Ваша почта подтверждена! СПАСИБО!!')->success()->important();
        return redirect(route('main'));
    }
}
