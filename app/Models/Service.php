<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Service
 *
 * @package App
 * @property string $service
 * @property double $price
 * @property double $price_the_evening
 * @property double $price_5_lessons
 * @property double $price_10_lessons
 * @property double $price_other
*/
class Service extends Model
{
    use SoftDeletes;

    protected $fillable = ['service', 'price', 'price_the_evening', 'price_5_lessons', 'price_10_lessons', 'price_other'];
    protected $hidden = [];
    
    

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setPriceAttribute($input)
    {
        if ($input != '') {
            $this->attributes['price'] = $input;
        } else {
            $this->attributes['price'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setPriceTheEveningAttribute($input)
    {
        if ($input != '') {
            $this->attributes['price_the_evening'] = $input;
        } else {
            $this->attributes['price_the_evening'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setPrice5LessonsAttribute($input)
    {
        if ($input != '') {
            $this->attributes['price_5_lessons'] = $input;
        } else {
            $this->attributes['price_5_lessons'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setPrice10LessonsAttribute($input)
    {
        if ($input != '') {
            $this->attributes['price_10_lessons'] = $input;
        } else {
            $this->attributes['price_10_lessons'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setPriceOtherAttribute($input)
    {
        if ($input != '') {
            $this->attributes['price_other'] = $input;
        } else {
            $this->attributes['price_other'] = null;
        }
    }
    
}
