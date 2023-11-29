<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lugares_naturales extends Model
{
    use HasFactory;

    public function imagenes(){
        return $this->belongstomany(imagenes::class,'lugares_naturales_has_imagenes');
    }
}
