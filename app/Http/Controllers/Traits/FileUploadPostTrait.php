<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

trait FileUploadPostTrait
{

    /**
     * File upload trait used in controllers to upload files
     * @param Request $request
     * @param $path - путь для сохранения файлов;
     * @param $w - ширина фото;
     * @param $h - высота фото
     * @return Request
     */
    public function saveFilesWidthHeight(Request $request, $path, $w, $h)
    {

		$uploadPath = public_path(env('UPLOAD_PATH').$path);
        if (! file_exists($uploadPath)) {
            mkdir($uploadPath, 0775);
        }

        $finalRequest = $request;

        foreach ($request->all() as $key => $value) {
            if ($request->hasFile($key)) {
                if ($request->has($key . '_max_width') && $request->has($key . '_max_height')) {
                    // Check file width
                    $filename = time() . '-' . $request->file($key)->getClientOriginalName();
                    $file     = $request->file($key);
                    $image    = Image::make($file)->fit($w, $h);

                    $image->save($uploadPath . '/' . $filename);
                    $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $filename]));
                } else {
                    $filename = time() . '-' . $request->file($key)->getClientOriginalName();
                    $request->file($key)->move($uploadPath, $filename);
                    $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $filename]));
                }
            }
        }

        return $finalRequest;
    }
}