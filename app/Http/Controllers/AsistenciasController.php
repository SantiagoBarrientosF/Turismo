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



        $imagenasistencia = $request->file('imagen');
        $imgasistencia = "";

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
        $asistencias ->nombre = $request ->nombre;
        $asistencias ->imagen = $urlasistencia;
        $asistencias ->id_estado = $request ->id_estado;

        $asistencias->save();

        return response()->json([
        'mensaje' => "Datos enviados correctamente",

        ]);


    }

    public function show($id){
        $asistencia=asistencias::findOrFail($id);

    }

    public function update(Request $request, asistencias $asistencias)
    {


        if($asistencias){ $asistencias = asistencias::where('id_asistencias', $request->id_asistencias);

            $imagenasistencia = $request->file('imagenlugar');


             if($imagenasistencia){

                 $imgasistencia = time() . '_' . $imagenasistencia-> getClientOriginalName();

                 $imagenasistencia->move(public_path('imagenes/asistencias'), $imgasistencia);
                 $urlasistencia = asset('imagenes/asistencias/'. $imgasistencia);

             }else{
                 $urlasistencia = null;
             }


            $asistencias ->contacto = $request ->contacto;
            $asistencias ->direccion = $request ->direccion;
            $asistencias ->nombre = $request ->nombre;
            $asistencias ->imagen = $urlasistencia;
            $asistencias ->id_estado = $request ->id_estado;

            $asistencias->update();

            return "Datos actualizados correctamente";
        }else{
            return "no se pudo actualizar";
        }

    }
    public function destroy(asistencias $asistencias)
    {
        //
    }
}
