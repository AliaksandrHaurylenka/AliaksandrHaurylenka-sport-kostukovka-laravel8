<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Board
 *
 * @package App
 * @property string $name
 * @property string $photo
 * @property text $description
*/
class Board extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'photo', 'description'];
    protected $hidden = [];

    const PATH = '/images/board/';

    public function getImageAdminPanel()
    {   
        return self::PATH.$this->photo;  
    }
}
