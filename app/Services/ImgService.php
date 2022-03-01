<?php namespace App\Services;

use App\Models\User;
use Carbon\Carbon;

/**
 * Created by PhpStorm.
 * User: edo
 * Date: 10/18/2018
 * Time: 1:01 PM
 */
class ImgService
{
    public static function render($folder,$name,$type = 'images')
    {
        $path = public_path("files" . DS . $type . DS . "$folder" . DS . $name);
        if (\File::exists($path)) {
            return "/files/$type/$folder/$name";
        }

        return "/public/img/no_image.jpg";
    }

    public static function renderImg($folder,$name,$type = 'images')
    {
        $path = storage_path("app" . DS ."public" . DS . $type . DS . "$folder" . DS . $name);

        if (\File::exists($path)) {
            return "/storage/images/$folder/$name";
        }

        return "/public/img/no_image.jpg";
    }



    public function uplaod($img, $model, $column, $folder)
    {
        $user = \Auth::user();
        $uniqId = md5($user->id . $user->name . uniqid());
        try {
            if (!\File::isDirectory(storage_path("app" . DS ."public" . DS . "images"))) {
                \File::makeDirectory(storage_path("app" . DS ."public" . DS . "images"));
            }
            if (!\File::isDirectory(storage_path("app" . DS ."public" . DS . "images" . DS . $folder))) {
                \File::makeDirectory(storage_path("app" . DS ."public" . DS . "images" . DS . $folder));
            }

            $image = \Image::make($img);
            $image->response(null,50);
            $ext = $img->getClientOriginalExtension();
            $imgName = "$uniqId.$ext";
            $path = storage_path("app" . DS ."public" . DS . "images" . DS . "$folder" . DS . $imgName);
            $image->save($path);

            $this->delete(storage_path("app" . DS ."public" . DS . "images" . DS . "$folder" . DS . $model->$column));

            $model->{$column} = $imgName;
            $model->save();

        } catch (\Exception $exception) {
            return true;
        }

        return false;
    }

    public function uploadFile($file,$folder,$type = 'images',$prefix=null)
    {
        $user = \Auth::user();
        $uniqId = uniqid($prefix);
        $ext = $file->getClientOriginalExtension();
        $filename = "$uniqId.$ext";
        $path = public_path("files" . DS . $type . DS . "$folder");
        $file->move($path, $filename);

        return $filename;
    }

    public function uploadFileToStorage($file,$folder,$type = 'images',$prefix=null)
    {
        $user = \Auth::user();
        $uniqId = uniqid($prefix);
        $ext = $file->getClientOriginalExtension();
        $filename = "$uniqId.$ext";
        $path = storage_path("app" . DS ."public" . DS . $type . DS . "$folder");
        $file->move($path, $filename);

        return $filename;
    }

    public function delete($path)
    {
        try {
            if (\File::exists($path)) {
                \File::delete($path);
            }
        } catch (\Exception $exception) {
            return true;
        }

        return false;
    }
}
