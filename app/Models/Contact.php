<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contact
 *
 * @package App
 * @property string $email
 * @property text $phone
*/
class Contact extends Model
{
    use SoftDeletes;

    protected $fillable = ['email', 'phone'];
    protected $hidden = [];
    
    
    
}
