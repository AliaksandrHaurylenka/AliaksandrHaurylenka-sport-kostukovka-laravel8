<?php
namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\FileDelTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Jenssegers\Date\Date;


/**
 * Class Ad
 *
 * @package App
 * @property string $title
 * @property string $photo
 * @property text $description
 * @property string $date
 * @property mixed folder
 */
class Ad extends Model
{
    use FileDelTrait;
    use SoftDeletes;
    use Sluggable;


    protected $fillable = ['title', 'photo', 'content', 'date', 'folder', 'ad'];
    protected $hidden = [];

    const PATH = '/images/ads/';


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable() {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    //    БЛОК ДЛЯ РАБОТЫ С ИЗОБРАЖЕНИЯМИ В АДМИНКЕ =====================================
    public function getImagePostAdminPanel()
    {
        if ($this->photo != null) {
            return self::PATH.$this->photo;
        }
    }


    public static function authUserRole()
    {
        if (Auth::user()->role_id == 1){
            return 'administrator';
        }
        else{
            return 'editor';
        }    
    }

    public function postStatus()
    {
        if ($this->status == 1){
            return 'active';
        }
        else{
            return 'wait';
        }    
    }

    public static function createFolder()
    {
        return 'Ad_N_'.FoldersSystem::folder_id(self::max('id')+1);
    }
    /**
     * Удаление фото при удалении записи из базы
     */
    public function removeImg()
    {
        $this->deleteImg(self::PATH, $this->photo);
    }

    public function remove()
    {
        $this->delFull(self::PATH, $this->photo);
    }
    //    КОНЕЦ БЛОК ДЛЯ РАБОТЫ С ИЗОБРАЖЕНИЯМИ В АДМИНКЕ =====================================


    //========== СВЯЗЬ ОБЪЯВЛЕНИЯ С АВТОРОМ =====================================
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @param $fields
     * @return Ad
     * Добавляет id пользователя написавшего объявление
     * и все поля прописанные в $fillable
     */
    public static function add($fields)
    {
        $ad = new static();
        $ad->fill($fields);
        $ad->user_id = Auth::user()->id;
        $ad->save();

        return $ad;
    }

    /**
     * @param $fields
     * Редактирование поста
     */
    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

//========== КОНЕЦ СВЯЗЬ ОБЪЯВЛЕНИЯ С АВТОРОМ ================================

//========== Методы переключения статуса постов =========================
    /**
     *
     */
    public function setDraft()
    {
        $this->status = 0;
        $this->save();
    }

    /**
     *
     */
    public function setPublic()
    {
        $this->status = 1;
        $this->save();
    }

    /**
     * @param $value
     * type integer
     * По умолчанию статус постов запрещен
     * Можно при добавлении поста через админку
     * сразу его опубликовать
     */
    public function toggleStatus($value)
    {
        if ($value == null) {
            return $this->setDraft();
        }
        return $this->setPublic();
    }

    /**
     * Переключатель постов в админке
     * Опубликовать, либо запретить к публикации
     */
    public function statusToggle() {
        if ($this->status == 0) {
            return $this->setPublic();
        }
        return $this->setDraft();
    }
//============= Конец методы переключения постов ========================


//============= FRONTEND ================================================
    /**
     * Вывод главного изображения объявления
     * @return string
     */
    public function getImage()
    {
        if ($this->photo != null) {
            return Ad::PATH . $this->photo;
        }
//        return Ad::PATH . $this->photo;
    }
    
    /**
     * Вывод изображений добавленных в объявление
     * @param $dir
     * @return mixed
     */
    function getImgGallery($dir)
    {
        $files = Storage::files($dir);
        return $files;
    }
    

    /**
     * Вывод даты в нужном формате
     * @return mixed
     */
    public function getDate()
    {
        $date = Date::createFromFormat('d/m/Y', $this->date)->format('F d, Y');
        return ucfirst($date);
    }

}
