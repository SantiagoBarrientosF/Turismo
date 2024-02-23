<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{

  public function index()
  {
    return usuarios::all();
  }


  public function store(Request $request)
  {
   /*
   $usuarios = new usuarios;

   $usuarios ->correo = $request ->correo;
   $usuarios ->contrasena = $request ->contrasena;



   $usuarios->save();
   return response()->json([
    'mensaje'=> 'Datos enviados correctamente',
   ]);
   */
  }

  public function Login(Request $request){

    $correo = $request->input('correo');
    $contrasena = $request->input('contrasena');

    // Validación de datos
    $request->validate([
        'correo' => 'required|email',
    ]);

    if (Auth::attempt(['correo' => $correo, 'contrasena' => $contrasena])) {
        $request->session()->regenerate();

        return response()->json([
            'mensaje'=>'Inicio de sesion exitoso',
        ]);


    } else {

        return back()->withErrors([
            'valor' => 'false',
            'error' => 'Los datos proporcionados no coinciden con nuestros registros.',
        ]);
    }
}

  public function logout(Request $request)
  {
    usuarios::logout();

    $request->session()->invalidate();

    //return redirect('/');
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
