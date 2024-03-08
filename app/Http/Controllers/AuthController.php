<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function login(request $request){
         $request->validate([
             'email' => 'required|email',
             'password' => 'required',

         ]);

        $credenciales = [
            "email"=> $request->email,
            "password" => $request -> password,

        ];

        if(Auth::attempt($credenciales)){

            $request->session()->regenerate();

            return $request->session()->all();



        }else{

            // return redirect('login');
            return abort(404);



        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}


