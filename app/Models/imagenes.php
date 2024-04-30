<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imagenes extends Model
{
    use HasFactory;
    protected $fillable = ['imagen'];
    protected $table =['imagenes'];

    protected $primaryKey='id_imagenes';

    public function asistencias(){

        return $this->belongstomany(asistencias::class,'imagenes_has_asistencias','id_asistencias','id_imagenes');
    }

    public function rutas(){
        return $this->belongstonmany(rutas::class,'rutas_has_imagenes');
    }

    public function eventos(){
        return $this->belongstomany(eventos::class,'imagenes_has_eventos','id_eventos','id_imagenes',);
    }

    public function establecimientos(){
        return $this->belongstomany(establecimiento::class,'establecimiento_has_imagenes','id_establecimiento','id_imagen');
    }
}
