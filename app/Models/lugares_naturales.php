<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lugares_naturales extends Model
{
    use HasFactory;

    protected $table = 'lugares_naturales';
    protected $fillable = ['id_lugar','distancia','nombre','imagenlugar','descripcion','id_estado'];
}
