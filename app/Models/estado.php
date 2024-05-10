<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class estado extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'estados';

    protected $primaryKey = 'id_estado';


    public function estado_establecimiento(){

        return $this ->belongstomany(establecimiento::class,'establecimientos');

       }


    public function eventos_estado(){
        return $this -> hasMany(estado::class,'eventos');
    }

    public function lugares_n_estado(){
       return $this -> hasMany(estado::class,'lugares_naturales');
    }
}
