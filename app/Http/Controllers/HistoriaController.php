<?php

namespace App\Http\Controllers;

use App\Models\Historia;
use Illuminate\Http\Request;

class HistoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Historia::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $historia = new Historia;
        $historia->id_historia= $request->id_historia;
        $historia->descripcion= $request->descripcion;

        $historia->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Historia $historia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Historia $historia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Historia $historia)
    {
        //
    }
}
