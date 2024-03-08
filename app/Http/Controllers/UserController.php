<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getuser(Request $request){

       // Obtener el usuario autenticado
    $user = $request->user();

    // Devolver los datos del usuario
    return response()->json($user);

    }
}
