<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Validation\ValidationException;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Поле "Имя" обязательно к заполнению',
            'message.required' => 'Поле "Комментарий" обязательно к заполнению',
            'message.max' => 'Количество символов комментария не должно превышать :max',
            'message.min' => 'Количество символов комментария должно быть не менее :min',
            'comment_captcha.required' => 'Поле "Код с картинки" обязательно к заполнению',
            'comment_captcha.captcha' => 'Код с картинки введен неверно',
        ];

        if (Auth::check()) {            
            $this->validate($request, [
                'message' => 'required|max:1000|min:2',
                'comment_captcha' => 'required|captcha',
            ], $messages);           
        } else {           
            $this->validate($request, [
                'name' => 'required|max:100|min:2',
                'message' => 'required|max:1000|min:2',
                'comment_captcha' => 'required|captcha',
            ], $messages);            
        }
        

        //dd($request);

        $comment = new Comment();
        $post = new Post();
        $comment->text = $request->get('message');
        $comment->post_id = $request->get('post_id');
        $comment->disAllow();


        if (Auth::check()) {
            $comment->user_id = Auth::user()->id;
        } else {
            $comment->name = $request->get('name');
        }


        Comment::mailNotification($comment);

        $comment->save();
        flash('Спасибо. Ваш комментарий скоро будет опубликован.')->success()->important();
        return redirect()->back();
    }
}
