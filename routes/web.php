<?php

use App\Http\Controllers\logincontroller;
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

route::view('/login',"login")->name('login');
route::view('/registro',"registro")->name('registro');
route::view('/usuario',"usuario")->name('usuario');


 //route::post('/registros',[logincontroller::class,'register'])->name('add_register');
 //route::post('/iniciarsesion',[logincontroller::class,'login'])->name('start_session');
 //route::get('/usuarios',[logincontroller::class,'logout'])->name('exit_session');
