<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imagenes extends Model
{
    use HasFactory;
    protected $fillable = ['imagen'];

    public function asistencias(){

        return $this->belongstomany(asistencias::class,'imagenes_has_asistencias');
    }

    public function rutas(){
        return $this->belongstonmany(rutas::class,'rutas_has_imagenes');
    }

    public function eventos(){
        return $this->belongstomany(eventos::class,'imagenes_has_eventos');
    }

    public function lugares_naturales(){
        return $this->belongstomany(lugares_naturales::class,'lugares_naturales_has_imagenes');
    }
}
