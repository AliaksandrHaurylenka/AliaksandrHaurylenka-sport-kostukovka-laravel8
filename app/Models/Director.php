<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Director
 *
 * @package App
 * @property string $name
 * @property string $photo
 * @property text $description
*/
class Director extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'photo', 'description', 'department'];
    protected $hidden = [];

    const PATH = '/images/directors/';

    public function getImageAdminPanel()
    {   
        return self::PATH.$this->photo;  
    }
}
