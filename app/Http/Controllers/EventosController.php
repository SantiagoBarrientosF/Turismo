<?php

namespace App\Http\Controllers;

use App\Models\eventos;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventosController extends Controller
{

    public function index()
    {

        $registros = eventos::where('fecha', '>', Carbon::now())->get();

              return $registros;

    }


    public function store(Request $request)
    {
        /*
        $request->validate([
            'nombre'=>'required',
            'fecha'=>'required',
            'descripcion'=>'required',
            'aforo'=>'required',
            'tipo_evento'=>'required',
            'contacto'=>'required',
            'imagen'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'


        ]);
        */


        $imagen = $request->file('imagen');

        if($imagen){

            $imagenevento = time() . '_' . $imagen-> getClientOriginalName();

            $imagen->move(public_path('imagenes/Eventos/'), $imagenevento);
            $urlevento = asset('imagenes/Eventos/'. $imagenevento);
        }else{
            $urlevento = null;
        }


        $eventos = new eventos;
        $eventos ->id_eventos = $request ->id_eventos;
        $eventos ->nombre = $request ->nombre;
        $eventos ->fecha = $request ->fecha;
        $eventos ->descripcion = $request ->descripcion;
        $eventos ->aforo = $request ->aforo;
        $eventos ->tipo_evento = $request ->tipo_evento;
        $eventos ->contacto = $request ->contacto;
        $eventos ->imagen = $urlevento;
        $eventos ->id_estado = $request ->id_estado;

        $eventos -> save();

        return response()->json([
            'message' => 'imagen enviada correctamente',
            'imagenevento' => $imagenevento,
        ]);

    }

    /*
     * Display the specified resource.
     */
    public function show($id_eventos)
    {
     $eventos=eventos::findorfail($id_eventos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_eventos)
    {

        $eventos= eventos::findOrFail($id_eventos);

        if($eventos){

            $eventos=eventos::where('id_eventos',$id_eventos);

        $imagen = $request->file('imagen');

        if($imagen){

            $imagenevento = time() . '_' . $imagen-> getClientOriginalName();

            $imagen->move(public_path('imagenes/Eventos/'), $imagenevento);
            $urlevento = asset('imagenes/Eventos/'. $imagenevento);
        }else{
            $urlevento = null;
        }

        $eventos -> nombre = $request -> nombre;
        $eventos -> fecha = $request -> fecha;
        $eventos -> descripcion = $request -> descripcion;
        $eventos -> aforos = $request -> aforos;
        $eventos -> tipo_evento = $request -> tipo_evento;
        $eventos -> contacto = $request -> contacto;
        $eventos ->imagen = $urlevento;
        $eventos -> id_estado = $request -> id_estado;

        $eventos -> Save();
    }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(eventos $eventos)
    {
        //
    }
}
