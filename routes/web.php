<?php

use App\Http\Controllers\AsistenciasController;
use App\Http\Controllers\EstablecimientoController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\logincontroller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistroMailable;
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


 route::post('/registros',[logincontroller::class,'register'])->name('add_register');
 route::post('/iniciarsesion',[logincontroller::class,'login'])->name('started_session');
 route::get('/usuarios',[logincontroller::class,'logout'])->name('exited_session');

 route::view('/actulizar',"actulizar")->name('actualizardatos');
 route::put('/actualizar',[EventosController::class,'update'])->name('actualizar');


 route::get('pdf_establecimiento',[EstablecimientoController::class,'pdf'])->name('pdf_establecimiento');
 route::get('pdf_asistencias',[AsistenciasController::class,'pdf'])->name('pdf_asistencias');
 route::get('pdf_eventos',[EventosController::class,'pdf'])->name('pdf_eventos');

 Route::get('/establecimientos', [EstablecimientoController::class,'vista']);
 Route::get('/establecimientos/{id_establecimiento}/edit', [EstablecimientoController::class,'edit']);

 Route::get('email', function(){
    Mail::to('sbarrientosf12@gmail.com')->send(new RegistroMailable);

    return 'mensaje enviada';
})->name('email');

// Route::post('/establecimientosa', function(RegistroMailable $registroMailable){

//     $correo='sbarrientosf12@gmail.com';

//     Mail::to($correo)->send($registroMailable);

//      return 'mensaje enviada';

// });
