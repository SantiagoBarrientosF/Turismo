<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asistencias extends Model
{
    use HasFactory;

    // protected $table ='asistencias';
    // protected $fillable=['id_asistencias','contacto','direccion','nombre','imagen','id_estado'];

    //  protected $primarykey='id_asistencias';

   public function imagenes(){

    return $this ->belongstomany(imagenes::class,'imagenes_has_asistencias');

   }
}
