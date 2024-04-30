<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class establecimiento extends Model
{
    use HasFactory;
    use SoftDeletes;

     protected $table = 'establecimientos';

     protected $fillable=['id_establecimiento','nombre','localidad','direccion','contacto','descripcion','tipo_negocio','propietario','id_estado','imagen','detalle'];

      protected $primaryKey = 'id_establecimiento';


    //   public function estado()
    //   {
    //       return $this->belongsTo(estado::class, 'id_estado');
    //   }

    //   public function establecimientos(){
    //     return $this->belongstomany(imagenes::class,'establecimiento_has_imagenes','id_establecimiento','id_imagen');
    // }

}
