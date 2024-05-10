<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class asistencias extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table ='asistencias';

    protected $fillable=['id_asistencias','contacto','direccion','nombre','imagen','tipo_negocio','id_estado'];

    protected $primaryKey='id_asistencias';

//    public function imagenes(){

//     return $this ->belongstomany(imagenes::class,'imagenes_has_asistencias','id_asistencias','id_imagenes');

//    }
//    public function estado(){
//        return $this->belongsTo(estado::class, 'id_estado');
//    }

//    public function imagenes()
//     {
//         return $this->belongsToMany(Imagen::class, 'producto_imagen', 'producto_id', 'imagen_id');
//     }
}
