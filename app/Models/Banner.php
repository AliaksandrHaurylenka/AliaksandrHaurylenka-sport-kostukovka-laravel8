<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Banner
 *
 * @package App
 * @property string $banner
 * @property string $link
*/
class Banner extends Model
{
    use SoftDeletes;

    protected $fillable = ['banner', 'link'];
    protected $hidden = [];

    const PATH = '/images/links/';


    public function getImageAdminPanel()
    {   
        return self::PATH.$this->banner;  
    }
}
