<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Jenssegers\Date\Date;
use App\Models\FoldersSystem;

use App\Http\Controllers\Traits\FileDelTrait;
// use Illuminate\Support\Facades\DB;

//use Illuminate\Notifications\Notifiable;

/**
 * Class Post
 *
 * @package App
 * @property string $title
 * @property string $slug
 * @property text $content
 * @property string $image
 * @property string $date
 * @property integer $section_id
 * @property integer $user_id
 * @property integer $status
 * @property integer $views
 * @property integer $is_featured
 * @property string $folder
 * @property mixed id
 */
class Post extends Model
{
    use SoftDeletes;
    use Sluggable;
    use FileDelTrait;

    protected $fillable = ['title', 'content', 'image', 'date', 'section_id', 'views', 'folder'];
    protected $hidden = [];

    const PATH = '/images/main-photo-posts/';
    const NEWS = '/images/news/';
    const IS_DRAFT = 0;
    const IS_PUBLIC = 1;


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

// ===============   СВЯЗЬ ПОСТА С КАТЕГОРИЕЙ   ===================


    public function section()
    {
        //связь один к одному
        return $this->belongsTo(Section::class);
    }

    /**
     * @return string
     * Если категория есть,
     * то выводим название категории,
     * иначе "Нет категории"
     * Используется в views->admin->posts->index
     */
    public function getSectionTitle()
    {
        return ($this->section != null) ? $this->section->title : 'Вид спорта?';
    }

    /**
     * @return null
     * Используется в views->admin->posts->edit,
     * т.е при редактировании поста выводит категорию
     */
    public function getSectionID()
    {
        return $this->section != null ? $this->section->id : null;
    }
//  ==============  КОНЕЦ СВЯЗЬ ПОСТА С КАТЕГОРИЕЙ  =================


// ===============  СВЯЗЬ ПОСТА С МЕТКОЙ  ===========================
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * https://laravel.com/docs/5.7/eloquent-relationships
     * Свяизь многие ко многим
     * Создана связующая таблица 'poststags'
     * и по ключу поста выводит связующий тэг
     */
    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'poststags',
            'post_id',
            'tag_id'
        );
    }

    /**
     * @return string
     * Если тэг есть,
     * то выводим название тэгов,
     * иначе "Нет метки"
     * Используется в views->admin->posts->index
     */
    public function getTagsTitle()
    {
        return (!$this->tags->isEmpty()) ? implode(', ', $this->tags->pluck('title')->all()) : 'Нет метки';
    }

    /**
     * @param $tags
     * Используется в контроллере PostsController->update
     * для добавления тегов
     */
    public function setTags($tags)
    {
        if ($tags == null) {
            return;
        }

        $this->tags()->sync($tags);
    }

    /**
     * @param $ids
     * Удаление меток
     */
    public function delTags($ids)
    {
        Poststag::where('post_id', $ids)->forceDelete();
    }
//  ===================  КОНЕЦ СВЯЗЬ ПОСТА С МЕТКОЙ  =========================


//  ===================  СВЯЗЬ ПОСТА С КОММЕНТАРИЕМ  =========================
    /**
     * Связь поста с комментариями
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Подсчет комментариев
     * @return mixed
     */
    public function commentsCount()
    {
        return $this->comments()->where('status', 1);
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getComments()
    {
        return $this->comments()
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->paginate(2);
    }
//  ===================  КОНЕЦ ПОСТА С КОММЕНТАРИЕМ  =========================


//  ===================  БЛОК ДЛЯ РАБОТЫ С ИЗОБРАЖЕНИЯМИ В АДМИНКЕ =====================================

    public function getImagePostAdminPanel()
    {
        if ($this->image != null) {
            // dd($this->image);
            return self::PATH.$this->image;
        }
        return self::PATH.'img-default.jpg';
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
        return 'N_'.FoldersSystem::folder_id(self::max('id')+1);
    }


    /**
     * Удаление фото при удалении записи в базе
     * Функция используется в update
     */
    public function removeImg()
    {
        // if ($this->image != null) {
        //     Storage::delete(Post::PATH . $this->image);
        // }

        $this->deleteImg(self::PATH, $this->image);
    }

    /**
     * Удаление фото при удалении записи в базе
     * Функция используется в perma_del
     */
    public function remove()
    {
        // $this->removeImg();
        // $this->forceDelete();

        $this->delFull(self::PATH, $this->image);
    }

//=============== КОНЕЦ   БЛОК ДЛЯ РАБОТЫ С ИЗОБРАЖЕНИЯМИ В АДМИНКЕ =====================================


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

//=================Понять для чего эти функции==========================

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setCategoryIdAttribute($input)
    {
        $this->attributes['section_id'] = $input ? $input : null;
    }

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
    public function setStatusAttribute($input)
    {
        $this->attributes['status'] = $input ? $input : 0;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setViewsAttribute($input)
    {
        $this->attributes['views'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setIsFeaturedAttribute($input)
    {
        $this->attributes['is_featured'] = $input ? $input : 0;
    }
//======================================================================

//========== СВЯЗЬ ПОСТА С АВТОРОМ =====================================
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @param $fields
     * @return Post
     * Добавляет id пользователя написавшего пост
     * и все поля прописанные в $fillable
     */
    public static function add($fields)
    {
        $post = new static();
        $post->fill($fields);
        $post->user_id = Auth::user()->id;
        $post->save();

        return $post;
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

//========== КОНЕЦ СВЯЗЬ ПОСТА С АВТОРОМ ================================

//========== Методы переключения статуса постов =========================
    /**
     *
     */
    public function setDraft()
    {
        $this->status = Post::IS_DRAFT;
        $this->save();
    }

    /**
     *
     */
    public function setPublic()
    {
        $this->status = Post::IS_PUBLIC;
        $this->save();
    }

    /**
     * @param $value
     * type integer
     * По умолчанию статус постов запрещен
     * Можно при добавлении поста через админку
     * сразу его опубликовать
     * @return string|void
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
    public function statusToggle()
    {
        if ($this->status == Post::IS_DRAFT) {
            return $this->setPublic();
        }
        return $this->setDraft();
    }
//============= Конец методы переключения постов ========================

//============= МЕТОДЫ ПЕРЕКЛЮЧЕНИЯ ПОСТА В РЕКОМЕНДОВАННЫЙ =============
    public function setFeatured()
    {
        $this->is_featured = 1;
        $this->save();
    }

    public function setStandart()
    {
        $this->is_featured = 0;
        $this->save();
    }

    public function toggleFeatured($value)
    {
        if ($value == null) {
            return $this->setStandart();
        }
        return $this->setFeatured();
    }


//============= КОНЕЦ МЕТОДЫ ПЕРЕКЛЮЧЕНИЯ ПОСТА В РЕКОМЕНДОВАННЫЙ =======


//============= FRONTEND ================================================
    /**
     * Вывод главного изображения поста
     * @return string
     */
    public function getImage()
    {
        if ($this->image == null) {
            return Post::PATH . 'img-default.jpg';
        }
        return Post::PATH . $this->image;
    }

    /**
     * Вывод даты в нужном формате
     * @return mixed
     */
    public function getDate()
    {
        return Date::createFromFormat('d/m/Y', $this->date)->format('F d, Y');
    }


    public function getMonth()
    {
        return Date::createFromFormat('d/m/Y', $this->date)->format('m');
    }

    public static function getMonthName($month)
    {
        return Date::createFromFormat('m', $month)->format('F');
    }

    public function getYear()
    {
        return Date::createFromFormat('d/m/Y', $this->date)->format('Y');
    }


    /**
     * Вывод изображений добавленных в пост
     * @param $dir
     * @return mixed
     */
    function getImgGallery($dir)
    {
        return Storage::files($dir);
    }


    /**
     * Метод вывода последних постов
     * @param $count - количество выводимых постов
     * @return mixed
     */
    public static function getPostsResent($count)
    {
        return self::where('status', 1)->orderByRaw('date desc, id desc')->take($count)->get();
    }

    /**
     * Метод вывода популярных постов по просмотрам
     * @param $count - количество постов
     * @return mixed
     */
    public static function getPostsPopular($count)
    {
        return self::where('status', 1)->orderBy('views', 'desc')->take($count)->get();
    }

    /**
     * Метод вывода рекомендованных постов
     * @param $count - количество выводимых постов
     * @return mixed
     */
    public static function getPostsFeatured($count)
    {
        return self::where('status', 1)->where('is_featured', 1)->orderBy('id', 'desc')->take($count)->get();
    }

    //============ АРХИВ ПОСТОВ ==========// 
    public static function archivesYears()
    {
        return static::selectRaw('year(date) as year, count(*) as number')
            ->groupBy('year')
            ->latest('year')
            ->where('status', 1)
            ->get();
    }

    /**
     *
     *
     * @param $year
     * @return
     */

    public static function archivesMonthYear($year)
    {
        return static::whereYear('date', $year)
            ->selectRaw('year(date) year, month(date) as month, monthname(date) as monthRU, count(*) as number')
            ->groupBy('year', 'month', 'monthRU')
            ->where('status', 1)
            ->get();
    }

    public function getMonthRUAttribute($month)
    {
        switch ($month) {
            case "January":
                return "Январь";
            case "February":
                return "Февраль";
            case "March":
                return "Март";
            case "April":
                return "Апрель";
            case "May":
                return "Май";
            case "June":
                return "Июнь";
            case "July":
                return "Июль";
            case "August":
                return "Август";
            case "September":
                return "Сентябрь";
            case "October":
                return "Октябрь";
            case "November":
                return "Ноябрь";
            case "December":
                return "Декабрь";
        }
    }
    //============ КОНЕЦ АРХИВ ПОСТОВ ==========//

    /**
     * Функция используется в blocks->post-carousel
     * Выводит по задонному количеству последние посты
     * в обратном порядке
     *
     */
    public function related($quantity)
    {
        return self::all()->except($this->id)->reverse()->take($quantity);
    }


//=========== NEXT - PREV POST ===========================
    public function hasPrevious()
    {
        return self::where('id', '<', $this->id)->max('id');
    }

    public function getPrevious()
    {
        $postID = $this->hasPrevious();
        return self::find($postID);
    }

    public function hasNext()
    {
        return self::where('id', '>', $this->id)->min('id');
    }

    public function getNext()
    {
        $postID = $this->hasNext();
        return self::find($postID);
    }
//=========== END NEXT - PREV POST ========================


//============= END FRONTEND ============================================



// ДЛЯ ТЕСТОВ ==========================================

    // Регистрация подписчиков
    public static function new_post(string $title, 
                                    string $slug, 
                                    string $content, 
                                    string $image, 
                                    string $date                                 
                                    ): self
    {
        return static::create([
            'title' => $title,
            'slug' => $slug,
            'content' => $content,
            'image' => $image,
            'date' => $date,
            // 'section_id' => $section_id,
            // 'user_id' => $user_id,
            // 'status' => $status,
            // 'views' => $views,
            // 'is_featured' => $is_featured
            // 'email' => $email,
            // 'token' => Str::uuid(),
        ]);
    }

}
