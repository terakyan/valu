<?php

namespace App\Models\Common;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Common extends Model
{
    public static function updateOrCreate(int $id = null, array $data,array $translations = [])
    {
        $model = self::find($id)??new static();
        (isset($model->id)) ? $model->update($data) : $model->fill($data) ;
        $model->save();
        return $model;
    }
}
