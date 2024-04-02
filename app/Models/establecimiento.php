<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class establecimiento extends Model
{
    use HasFactory;

     protected $table = 'establecimientos';

     protected $fillable=['id_establecimiento','nombre','localidad','direccion','contacto','descripcion','tipo_negocio','propietario','id_estado','imagen','detalle'];

     protected $primaryKey = 'id_asistencias';


    public function estados(){

        return $this ->hasMany(estado::class,'establecimientos');
    }




}
