<?php

namespace App\Http\Controllers;

use App\Models\calificaciones;
use Illuminate\Http\Request;

class CalificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return calificaciones::all();
    }

    public function store(Request $request)
    {

        $calificaciones = new calificaciones;
        $calificaciones ->id_calificaciones = $request ->id_calificaciones;
        $calificaciones ->calificacion = $request ->calificacion;
        $calificaciones ->nombre =$request ->nombre;
        $calificaciones ->comentario = $request ->comentario;
        $calificaciones -> save();

        $calificaciones->save();

    }


    public function show(calificaciones $calificaciones)
    {

    }


    public function update(Request $request, calificaciones $calificaciones)
    {

        $calificaciones ->calificacion = $request -> calificacion;
        $calificaciones ->nombre =$request -> nombre;
        $calificaciones ->comentario = $request -> comentario;

        $calificaciones -> update();


    }


    public function destroy(calificaciones $calificaciones)
    {
        //
    }
}
