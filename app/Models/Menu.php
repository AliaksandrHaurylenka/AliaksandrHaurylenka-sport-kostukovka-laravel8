<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Menu extends Model
{
    use SoftDeletes;
    use Sluggable;

    protected $fillable = ['title', 'drop'];
    protected $hidden = [];

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
     * Set attribute to money format
     * @param $input
     */
    public function setDropAttribute($input)
    {
        $this->attributes['drop'] = $input ? $input : 0;
    }


    // ДЛЯ ТЕСТОВ ==========================================

    // Регистрация подписчиков
    public static function new_menu(string $title, string $slug, int $drop): self
    {
        return static::create([
            'title' => $title,
            'slug' => $slug,
            'drop' => $drop
        ]);
    }
}
