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


    public function estado_establecimiento(){

        return $this ->hasMany(estado::class,'establecimientos');
    }





}
