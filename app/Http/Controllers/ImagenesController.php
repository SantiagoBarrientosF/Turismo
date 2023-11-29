<?php

namespace App\Http\Controllers;

use App\Models\imagenes;
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

        find()->with(['lugares_naturales.imagen']);
        find()->with(['eventos.imagen']);
        find()->with(['rutas.imagen']);
        find()->with(['asistencias.imagen']);

        $nuevaImagen->save();



        return response()->json(['url' => $urlImagen]);
    }



    public function show(imagenes $imagenes)
    {
        //
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
