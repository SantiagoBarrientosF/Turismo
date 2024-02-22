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

        // $request->validate([

        // 'imagenasistencias' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        // ]);

        $imagenasistencia = $request->file('imagen');
        //$imgasistencia = "";

        if($imagenasistencia){

            $imgasistencia = time() . '_' . $imagenasistencia-> getClientOriginalName();

            $imagenasistencia->move(public_path('imagenes/asistencias'), $imgasistencia);
            $urlasistencia = asset('imagenes/asistencias/'. $imgasistencia);

        }else{
            $urlasistencia = null;
        }

        $asistencias = new asistencias;
        $asistencias ->id_asistencias = $request ->id_asistencias;
        $asistencias ->contacto = $request ->contacto;
        $asistencias ->direccion = $request ->direccion;
        $asistencias ->tipo = $request ->tipo;
        $asistencias ->imagen = $urlasistencia;
        $asistencias ->id_estado = $request ->id_estado;

        $asistencias->save();

        return response()->json([
        'mensaje' => "Datos enviados correctamente",

        ]);


    }

    public function update(Request $request, asistencias $asistencias)
    {
     return "WORKS";
    }

    public function destroy(asistencias $asistencias)
    {
        //
    }
}
