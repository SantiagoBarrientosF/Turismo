<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class index extends Model
{
    use HasFactory;

    protected $table ='indices';

    protected $fillable=['id_index','titulo','imagen','descripcion','categoria'];

    protected $primaryKey='id_index';
}
