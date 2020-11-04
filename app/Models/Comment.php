<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\NewComment;
use Notification;

// use User;

/**
 * Class Comment
 *
 * @package App
 * @property text $text
 * @property integer $user_id
 * @property integer $post_id
 * @property integer $status
 */
class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = ['text', 'user_id', 'post_id', 'name'];
    protected $hidden = [];
    /**
     * @var mixed
     */
    private $name;


    /**
     * Set attribute to money format
     * @param $input
     */
    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPostIdAttribute($input)
    {
        $this->attributes['post_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setStatusAttribute($input)
    {
        $this->attributes['status'] = $input ? $input : 0;
    }


    //================COMMENTS=======================
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function allow()
    {
        $this->status = 1;
        $this->save();
    }

    public function disAllow()
    {
        $this->status = 0;
        $this->save();
    }

    public function toggleStatus()
    {
        if ($this->status == 0) {
            return $this->allow();
        }

        return $this->disAllow();
    }

    /**
     * Отправляет всем пользователям увдомление о новом комментарии
     * @param $comment
     */
    public static function allUsers($comment)
    {
        Notification::send(User::all(), new NewComment($comment));
    }

    /**
     * Отправляет админу увдомление о новом комментарии
     * добавленном редакторами сайта
     * @param $comment
     */
    public static function adminNewComment($comment)
    {
        User::find(1)->notify(new NewComment($comment));
    }

    /**
     * Отправка почты пользователям, либо админу
     * в зависимости от статуса поста
     * @param $comment
     * @return
     */
    public static function mailNotification($comment)
    {
        if ($comment->status) {
            Comment::allUsers($comment);
        } else {
            Comment::adminNewComment($comment);
        }
    }
    //================END COMMENTS===================

}
