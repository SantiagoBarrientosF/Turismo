<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class lugares_naturales extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'lugares_naturales';
    protected $fillable = ['id_lugar','distancia','nombre','imagenlugar','descripcion','id_estado'];

    protected $primaryKey ='id_lugar';


}
