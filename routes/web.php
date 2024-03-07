<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request; // Importar la fachada Request para la validación
use Illuminate\Support\Facades\Hash;

// Route::get('/', function () {
//     // Redirigir al inicio de sesión o a la página de inicio según el estado de la autenticación
//     if (Auth::check()) {
//         return redirect()->route('home'); // Suponiendo que tienes una ruta 'home'
//     }
//     return view('welcome');
// });

Route::get('nombre', function () {
    return view('login'); //accion aejecutar
})->name('login');

Route::post('nombre', function (Request $request) {
     //Validar correo electrónico y contraseña
   /* $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
    ]);*/

    $credenciales = $request->only('email', 'password');

    if (Auth::attempt($credenciales)) {
        // Autenticación exitosa
        // Devolver un JSON con la información del usuario
        return response()->json([
            'success' => true,
            'usuario' => Auth::user(),
            'token' => Auth::user()//->createTokenForApplication(),
        ]);
    }

    // Autenticación fallida
    // Devolver un JSON con un mensaje de error
    //  return response()->json([
        // 'success' => false,
        // 'message' => 'Credenciales inválidas',
    // ], 401);





});
