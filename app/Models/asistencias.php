<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asistencias extends Model
{
    use HasFactory;

   public function imagenes(){

    return $this ->belongstomany(imagenes::class,'imagenes_has_asistencias');

   }
}
