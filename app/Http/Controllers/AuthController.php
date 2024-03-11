<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



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

        $credenciales = $request->only('email', 'password');


        if(Auth::attempt($credenciales)){

            $user=Auth::user();

            $usuarios = new User;
             //$request->session()->regenerate();

            $token = $usuarios->createToken('token-name')->plainTextToken;


            return response()->json(['token' => $token]);

            // return $request->session()->all();



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


