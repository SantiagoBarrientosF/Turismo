<?php

namespace App\Http\Controllers;

use App\Models\lugares_naturales;
use Illuminate\Http\Request;

class LugaresNaturalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        lugares_naturales::all();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $L_naturales= new lugares_naturales;
        $L_naturales -> id_lugar = $request ->id_lugar;
        $L_naturales -> distancia = $request -> distancia;
        $L_naturales -> nombre = $request -> nombre;
        $L_naturales -> descripcion = $request -> descripcion;
    }

    /**
     * Display the specified resource.
     */
    public function show(lugares_naturales $lugares_naturales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lugares_naturales $lugares_naturales)
    {
        //
    }
}
