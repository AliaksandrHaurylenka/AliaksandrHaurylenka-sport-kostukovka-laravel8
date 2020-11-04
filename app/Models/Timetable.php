<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Timetable
 *
 * @package App
 * @property string $photo
 * @property text $timetable
*/
class Timetable extends Model
{
    use SoftDeletes;

    protected $fillable = ['photo', 'timetable'];
    protected $hidden = [];

    const PATH = '/images/timetable/';

    public function getImageAdminPanel()
    {   
        return self::PATH.$this->photo;  
    }  
}
