<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * Class Tag
 *
 * @package App
 * @property string $title
 * @property string $slug
*/
class Tag extends Model
{
    use SoftDeletes;
    use Sluggable;

    protected $fillable = ['title'];
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

    public function posts() {
        return $this->belongsToMany(
            Post::class,
            'poststags',
            'tag_id',
            'post_id'
        );
    }
    
}
