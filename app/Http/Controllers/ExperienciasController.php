<?php

namespace App\Http\Controllers;

use App\Models\Experiencias;
use Illuminate\Http\Request;

class ExperienciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Experiencias::all();
    }


    public function store(Request $request)
    {
        $experiencias = new Experiencias;
        $experiencias -> id_experiencias = $request -> id_experiencias;
        $experiencias -> imagen = $request -> id_experiencias;
        $experiencias -> categoria = $request -> categoria;
        $experiencias -> titulo = $request -> titulo;
        $experiencias -> descripcion = $request -> descripcion;

        $experiencias->save();

        return $experiencias;
    }

    /**
     * Display the specified resource.
     */
    public function show(Experiencias $experiencias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Experiencias $experiencias)
    {
        $experiencias = new Experiencias;
        $experiencias -> id_experiencias = $request -> id_experiencias;
        $experiencias -> imagen = $request -> id_experiencias;
        $experiencias -> categoria = $request -> categoria;
        $experiencias -> titulo = $request -> titulo;
        $experiencias -> descripcion = $request -> descripcion;

        $experiencias->save();

        return $experiencias;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experiencias $experiencias)
    {
        //
    }
}
