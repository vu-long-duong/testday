<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

trait UpdateImagetTrait
{
    public function uploadimage($image, $newname, $folder)
    {
        if (file($image)) {
            $file_name = $image->getClientoriginalName();
            $file_name = explode(".", $file_name);
            $ext = end($file_name);
            $new_name = $newname . uniqid() . '.' . $ext;
            $image->storeAs($folder, $new_name, 'public');
            $image = $new_name;
        }
        return $image;
    }

    public function deleteImage($pathImg, $folder)
    {
        if ($pathImg) {
            $destinationPath = 'public/' . $folder . '/' . $pathImg;
            if (file_exists($destinationPath)) {
                unlink($destinationPath);
            }
        }
    }
}
