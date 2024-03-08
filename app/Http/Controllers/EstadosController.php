<?php

namespace App\Http\Controllers;

use App\Models\estado;
use App\Models\estados;
use Illuminate\Http\Request;

class EstadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        estado::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $estado = new estado;
        $estado ->id_estado = $request -> $estado;
        $estado ->estado = $request->$estado;

        $estado->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(estado $estados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, estado $estados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(estado $estados)
    {
        //
    }
}
