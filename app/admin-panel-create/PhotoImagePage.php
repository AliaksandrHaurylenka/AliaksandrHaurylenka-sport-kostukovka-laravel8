<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoImagePage extends Model
{
    use SoftDeletes;

    const  PATH = 'img/';

    protected $fillable = ['photo', 'section'];
    protected $hidden = [];



    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPhotoImagePageAttribute($input)
    {
        $this->attributes['photo'] = $input ? $input : null;
    }


    /**
     * Удаление фото при удалении записи в базе
     * Функция используется в update
     */
    public function removeImg()
    {
      if ($this->photo != null) {
        unlink(public_path(PhotoImagePage::PATH . $this->photo));
      }
    }

    /**
     * Удаление фото при удалении записи в базе
     * Функция используется в perma_del
     */
    public function remove()
    {
      $this->removeImg();
      $this->forceDelete();
    }
}
