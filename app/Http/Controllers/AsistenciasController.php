<?php

namespace App\Http\Controllers;

use App\Models\asistencias;
use Illuminate\Http\Request;

class AsistenciasController extends Controller
{
    public function index(){

        return asistencias::all();

    }

    public function store(Request $request){



        $asistencias = new asistencias;
        $asistencias -> id_asistencias = $request ->id_asistencias;
        $asistencias -> contacto = $request -> contacto;
        $asistencias -> direccion = $request -> direccion;
        $asistencias -> tipo = $request -> tipo;
        $asistencias -> id_estado = $request -> id_estado;

        $asistencias->save();


    }
}
