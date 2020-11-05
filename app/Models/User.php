<?php
namespace App\Models;

use App\Notifications\NewEvent;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\ResetPassword;
use Hash;
use Notification;
use Illuminate\Support\Facades\Storage;
use Str;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $role
 * @property string $remember_token
 * @property text $description
 * @property string $avatar
*/
class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['name', 'email', 'password', 'remember_token', 'description', 'avatar', 'role_id'];
    protected $hidden = ['password', 'remember_token'];
    
    const ADS_PATH = '/images/simple_users/объявления/';
    const NEWS_PATH = '/images/simple_users/новости/';
    const PATH = '/images/avatars/';
    
    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setRoleIdAttribute($input)
    {
        $this->attributes['role_id'] = $input ? $input : null;
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    
    
    

    public function sendPasswordResetNotification($token)
    {
       $this->notify(new ResetPassword($token));
    }



    /**
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    /**
     * Отправляет админу увдомление о новом посте
     * добавленном редакторами сайта
     * @param $event
     */
    public static function adminNewPost($event)
    {
        User::find(1)->notify(new NewEvent($event));
    }

    /**
     * Отправляет всем пользователям увдомление о новом посте
     * @param $event
     */
    public static function allUsers($event)
    {
        Notification::send(User::all(), new NewEvent($event));
        // User::all()->notify(new NewEvent($event)); // выдает ошибку
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
            User::allUsers($event);
        }else{
            User::adminNewPost($event);
        }

//        dd($event->folder);
        $folder = $event->folder;
        return $folder;
    }
    
    /**
    * Загрузка аватарки пользователя
    * @param undefined $image
    * 
    * @return
    */
    public function uploadAvatar($image)
    {
//        dd(get_class_methods($image));//выводит методы класса
        if ($image == null) {
            return;
        }
        //$this->removeAvatar();
        $filename = Str::random(10) . '.' . $image->extension();
        $image->storeAs(User::PATH, $filename);
        $this->avatar = $filename;
        $this->save();
    }

     //    БЛОК УДАЛЕНИЯ =====================================
    /**
     * Удаление фото при удалении записи в базе
     */
    public function removeImg()
    {
        if ($this->avatar != null) {
            Storage::delete(User::PATH . $this->avatar);
        }
    }

    public function remove()
    {
        $this->removeImg();
        $this->forceDelete();
    }
    //    КОНЕЦ БЛОК УДАЛЕНИЯ =====================================
    
    
    
    /**
    * Вывести аватарку пользователя
    * 
    * @return
    */
    public function getImage()
    {
        if ($this->avatar == null) {
            return User::PATH . 'user2-160x160.jpg';
        }
        return User::PATH . $this->avatar;
    }
    
    /**
    * Редактирование профиля пользователя
    * @param undefined $fields
    * 
    * @return
    */
     public function edit(array $fields)
    {
        $this->fill($fields); //name, email
        $this->save();
    }
    
    /**
    * Генерирование пароля
    * @param undefined $password
    * 
    * @return
    */
    public function generatePassword($password)
    {
        if($password != null)
        {
            $this->password = bcrypt($password);
            $this->save();
        }
    }



    // ДЛЯ ТЕСТОВ===========================================

    // Добавление нового пользователя администратором
    public static function new(string $name, string $email, int $role_id, string $description): self
    {
        return static::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt(Str::random()),
            'role_id' => $role_id,
            'description' => $description,
            // 'avatar' => $avatar
        ]);
    }
}
