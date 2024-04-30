<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class index extends Model
{
    use HasFactory;

    public function index(){

        return $this->belongstomany(imagenes::class,'index_has_imagenes','id_index','id_imagenes');
    }
}
