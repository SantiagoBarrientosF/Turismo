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

        $request->validate([
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagen = $request->file('imagen');


        $nombreImagen = time() . '_' . $imagen->getClientOriginalName();


        $imagen->move(public_path('imagenes'), $nombreImagen);
        $urlImagen = asset('imagenes/' . $nombreImagen);

        $nuevaImagen = new imagenes();
        $nuevaImagen->imagen = $nombreImagen;
        $nuevaImagen-> url = $urlImagen;

        $relaciones = imagenes::find('$id')->with(['lugares_naturales.imagen']);
        $relaciones = imagenes::find('$id_eventos')->with(['eventos.imagen']);
        $relaciones = imagenes::find('$id_rutas')->with(['rutas.imagen']);
        $relaciones = imagenes::find('$id_asistencias')->with(['asistencias.imagen']);


        $nuevaImagen->save();
        $relaciones->save();


        return response()->json(['url' => $urlImagen]);
    }



    public function show(imagenes $imagenes)
    {

    }


    public function update(Request $request, imagenes $imagenes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(imagenes $imagenes)
    {
        //
    }

}
