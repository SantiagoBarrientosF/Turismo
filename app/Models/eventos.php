<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class eventos extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function imagenes(){
        return $this->belongstomany(imagenes::class,'imagenes_has_eventos');
    }
}
