<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function register(Request $request){
    //  $request->validate{[

    // ]
    // };


    $user = new User();
    $user ->name = $request->name;
    $user ->email = $request->email;
    $user->password = Hash::make($request->password);
    $user ->save();

     Auth::login($user);

    return redirect('login');

   }

    public function login(request $request){
        // $request->validate([
            // 'name'=>'required',
            // 'email' => 'required|email',
            // 'password' => 'required',

        // ]);

        $credenciales = [
            "email"=> $request->email,
            "password" => $request -> password,

        ];

        if(Auth::attempt($credenciales)){

            $request->session()->regenerate();

           return redirect()->intended('usuario');


        }else{

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
