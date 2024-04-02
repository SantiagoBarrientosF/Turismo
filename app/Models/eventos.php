<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class eventos extends Model
{
    use HasFactory;
    //use SoftDeletes;
     protected $table ='eventos';
     protected $fillable = ['id_eventos','nombre','fecha','descripcion','aforo','tipo_evento','contacto','imagen','id_estado'];

     protected $primarykey= 'id_eventos';

    public function imagenes(){
        return $this->belongstomany(imagenes::class,'imagenes_has_eventos');

    }

    public function estado(){
        return $this->hasMany(estado::class,'estado');
    }
}
