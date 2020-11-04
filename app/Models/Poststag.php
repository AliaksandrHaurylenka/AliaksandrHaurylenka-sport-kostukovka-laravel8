<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Poststag
 *
 * @package App
 * @property integer $post_id
 * @property integer $tag_id
*/
class Poststag extends Model
{
    use SoftDeletes;
    protected $fillable = ['post_id', 'tag_id'];
    protected $hidden = [];


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
    public function setTagIdAttribute($input)
    {
        $this->attributes['tag_id'] = $input ? $input : null;
    }
}
