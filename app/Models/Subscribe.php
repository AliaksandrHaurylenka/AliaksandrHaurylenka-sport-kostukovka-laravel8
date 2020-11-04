<?php
namespace App\Models;

use App\Notifications\NewEvent;
use App\Notifications\NewComment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
use Illuminate\Notifications\Notifiable;
use Str;
use Notification;
use Jenssegers\Date\Date;

/**
 * Class Subscribe
 *
 * @package App
 * @property string $email
 * @property string $token
*/
class Subscribe extends Model
{
    use SoftDeletes;
    use Notifiable;

    protected $fillable = ['email', 'token'];
    protected $hidden = [];


    public function remove()
    {
        $this->delete();
    }

    /**
     * @return mixed
     */
    public static function viewSubscriber()
    {
        $obj = Auth::user();
    //    dd($obj);

        if(!empty($obj)){
            $email = $obj->email;
            // dd($email);
            // dd(self::where('email', $email)->first());
            // return self::where('email', $email)->first();
        }

    }

    /**
     * Отправляет всем пользователям увдомление о новом посте
     * @param $event
     */
    public static function allSubscribe($event)
    {
        Notification::send(Subscribe::all(), new NewEvent($event));
    }

    /**
     * Отправка почты пользователям, либо админу
     * в зависимости от статуса поста
     * @param $event
     * @return
     */
    public static function mailNotification($event)
    {
        if($event->status){
            Subscribe::allSubscribe($event);
        }

//        dd($event->folder);
        $folder = $event->folder;
        return $folder;
    }


    /**
     * Отправляет всем пользователям увдомление о новом комментарии
     * @param $comment
     */
    public static function allSubscribeComment($comment)
    {
        Notification::send(Subscribe::all(), new NewComment($comment));
    }

    /**
     * Отправка почты пользователям
     * в зависимости от статуса 
     * @param $comment
     * @return
     */
    public static function mailNotificationComment($comment)
    {
        if($comment->status){
            Subscribe::allSubscribeComment($comment);
        }
    }


    public function getDate($date)
    {
        return Date::createFromFormat('Y-m-d H:i:s', $this->$date)->format('d/m/Y');
    }



    // ДЛЯ ТЕСТОВ ==========================================

    // Регистрация подписчиков
    public static function register_subscriber(string $email): self
    {
        return static::create([
            'email' => $email,
            'token' => Str::uuid(),
        ]);
    }


    // Верификация подписчиков
    public function verify(): void
    {
        if (!$this->token) {
            throw new \DomainException('Подписчик уже верефицирован!');
        }

        $this->update([
            'token' => null,
        ]);
    }
}
