<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;
use App\Http\Requests\SubscribesRequest;
use App\UseCases\Auth\RegisterService;

class SubscribesController extends Controller
{
    private $service;


    public function __construct(RegisterService $service)
    {
        $this->middleware('guest');
        $this->service = $service;
    }

    public function subscribe(SubscribesRequest $request)
    {
        if ($request->isMethod('post')) {
            if($request->has('politica')){
                $messages = [
                    'email.required' => 'Поле "E-mail" обязательно к заполнению',
                    'captcha' => 'Код с картинки введен неверно',
                ];
    
                $this->validate($request, [
                    'email' => 'required|email',
                    'captcha' => 'required|captcha',
                ], $messages);
                
                $this->service->register($request);
                
                flash('Для подтверждения рассылок, пожалуйста, перейдите в свою почту!')->success()->important();
            }else{
                flash('Необходимо согласиться с политикой конфидиальности!')->error()->important();
            }
            
            // $messages = [
            //     'email.required' => 'Поле "E-mail" обязательно к заполнению',
            //     'captcha' => 'Код с картинки введен неверно',
            // ];

            // $this->validate($request, [
            //     'email' => 'required|email',
            //     'captcha' => 'required|captcha',
            // ], $messages);
            
            // $this->service->register($request);
        }

        // flash('Для подтверждения рассылок, пожалуйста, перейдите в свою почту!')->success()->important();
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