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
        if (Auth::check()) {
            try {
                $this->validate($request, [
                    'message' => 'required',
                ]);
            } catch (ValidationException $e) {
            }
        } else {
            try {
                $this->validate($request, [
                    'message' => 'required',
                    'name' => 'required',
                ]);
            } catch (ValidationException $e) {
            }
        }

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
