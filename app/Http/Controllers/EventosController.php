<?php

namespace App\Http\Controllers;

use App\Models\eventos;
use Illuminate\Http\Request;

class EventosController extends Controller
{

    public function index()
    {
        return eventos::all();
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'fecha'=>'required',
            'descripcion'=>'required',
            'aforos'=>'required',
            'tipo_evento'=>'required',
            'imagen' =>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'contacto'=>'required',


        ]);

        //$imagen = $request->file['imagen'];

        //$Imagenevento = time() . '_' . $imagen-> getClientOriginalName();

        //$imagen->move(public_path('imagenes'), $Imagenevento);
        //$urlevento = asset('imagenes/'. $Imagenevento);

        $eventos = new eventos;
        $eventos ->id_eventos = $request ->id_eventos;
        $eventos ->nombre = $request ->nombre;
        $eventos ->fecha = $request ->fecha;
        $eventos ->descripcion = $request ->descripcion;
        $eventos ->aforos = $request ->aforos;
        $eventos ->tipo_evento = $request ->tipo_evento;
        //  $eventos ->imagen = $Imagenevento;
        $eventos ->contacto = $request ->contacto;
        $eventos ->id_estado = $request ->id_estado;

        $eventos -> save();

    }

    /*
     * Display the specified resource.
     */
    public function show(eventos $eventos)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, eventos $eventos)
    {
        $eventos = new eventos;
        $eventos -> id_eventos = $request -> id_eventos;
        $eventos -> nombre = $request -> nombre;
        $eventos -> fecha = $request -> fecha;
        $eventos -> descripcion = $request -> descripcion;
        $eventos -> aforos = $request -> aforos;
        $eventos -> tipo_evento = $request -> tipo_evento;
        $eventos -> contacto = $request -> contacto;
        $eventos -> id_estado = $request -> id_estado;

        $eventos -> update();

        return $eventos;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(eventos $eventos)
    {
        //
    }
}
