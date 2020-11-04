<?php

namespace App\Http\Controllers\Traits;


use Illuminate\Support\Facades\Storage;

trait FileDelTrait
{
//    БЛОК УДАЛЕНИЯ =====================================
    /**
     * Удаление фото при удалении записи из базы
     * @param $path - string: путь к файлу
     * @param $column - var: колонка в таблице
     */
    public function deleteImg($path, $img)
    {
        if ($img != null) {
            Storage::delete($path.$img);
        }
    }

    public function delFull($path, $img)
    {
        $this->deleteImg($path, $img);
        $this->forceDelete();
    }
    //    КОНЕЦ БЛОК УДАЛЕНИЯ =====================================
}