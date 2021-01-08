<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\LetterMail;


class LetterController extends Controller
{

    public function letter(Request $request)
    {
        //dd($request->all());

        if ($request->isMethod('post')) {

            $messages = [
                'name.required' => 'Поле "Имя" обязательно к заполнению',
                'email.required' => 'Поле "E-mail" обязательно к заполнению',
                'text.required' => 'Поле "Сообщение" обязательно к заполнению',
                'text' => 'Количество символов сообщения не должно превышать 1000',
                'captcha.required' => 'Поле "Код с картинки" обязательно к заполнению',
                'email' => 'Поле :attribute должно быть email адресом',
                'captcha' => 'Код с картинки введен неверно',
            ];

            $this->validate($request, [
                'email' => 'required|email',
                'name' => 'required|max:255',
                'text' => 'required|max:1000|min:5',
                'captcha' => 'required|captcha',
            ], $messages);

            $data = $request->all();

            Mail::send(new LetterMail($data));

            flash('Ваше сообщение отправлено!')->success()->important();
            return redirect()->back();
        }
    }


    public function refereshCapcha()
    {
        return captcha_img('flat');
    }
}