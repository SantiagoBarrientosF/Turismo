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

        //$request->validate([
            //'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        //]);
        /*
        $imagen = Imagen::find($imagenId);
        $historia = Historia::find($eventoId);

        $imagen->Historia()->attach($historia);
        */

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
