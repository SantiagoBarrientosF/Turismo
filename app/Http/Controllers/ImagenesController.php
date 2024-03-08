<?php

namespace App\Http\Controllers;

use App\Models\asistencias;
use App\Models\imagenes;
use App\Models\lugares_naturales;
use App\Models\rutas;
use Illuminate\Http\Request;

class ImagenesController extends Controller
{

    public function index()
    {
        return imagenes::all();
    }


    public function store(Request $request)
    {
        $imagenprincipal = $request->file('imagen');
        $imgasistencia = "";

        if($imagenprincipal){

            $imgprincipal= time() . '_' . $imagenprincipal-> getClientOriginalName();

            $imagenprincipal->move(public_path('imagenes/principal'), $imgprincipal);
            $urlprincipal = asset('imagenes/principal/'. $imgprincipal);

        }else{
            $urlprincipal = null;
        }

        $imagenes = new imagenes;
        $imagenes ->id_asistencias = $request ->id_asistencias;
        $imagenes ->contacto = $request ->contacto;
        $imagenes ->direccion = $request ->direccion;
        $imagenes ->nombre = $request ->nombre;
        $imagenes ->imagen = $urlprincipal;
        $imagenes ->id_estado = $request ->id_estado;

        $imagenes->save();

        return response()->json([
        'mensaje' => "Datos enviados correctamente",

        ]);


    }

    public function show(imagenes $imagenes)
    {

    }


    public function update(Request $request, imagenes $imagenes)
    {
        $putimg="";
        //$putimg->imagenes::find('id');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(imagenes $imagenes)
    {
        //
    }

}
