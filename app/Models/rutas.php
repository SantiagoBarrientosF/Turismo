<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rutas extends Model
{
    use HasFactory;
    protected $table ='rutas';

    public function imagenes(){
        return $this->belongtonmany(imagenes::class,'rutas_has_imagenes');
    }
}
