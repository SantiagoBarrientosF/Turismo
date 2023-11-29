<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{

    public function index()
    {
        return usuarios::all();
    }


    public function store(Request $request)
    {
        $request->validate([
            'contrasena'=>'required'
            
        ]);
      $usuarios = new usuarios;
      $usuarios -> id_usuarios = $request ->id_usuarios;
      $usuarios -> contrasena = $request -> contrasena;
      $usuarios -> id_perfil = $request -> id_perfil;
      

      $usuarios->save();
      return $usuarios;
    }

    /**
     * Display the specified resource.
     */
    public function show(usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, usuarios $usuarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(usuarios $usuarios)
    {
        //
    }
}
