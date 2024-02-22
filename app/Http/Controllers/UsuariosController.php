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
      $usuarios = new usuarios;
      $usuarios ->id_usuarios = $request ->id_usuarios;
      $usuarios ->nombre = $request ->nombre;
      $usuarios ->apellido = $request ->apellido;
      $usuarios ->correo = $request ->correo;
      $usuarios ->contrasena = $request ->contrasena;



      $usuarios->save();
      return response()->json([
       'mensaje'=> 'Datos enviados correctamente',
      ]);
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
