<?php

use App\Http\Controllers\AsistenciasController;
use App\Http\Controllers\EstablecimientoController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\logincontroller;
use App\Mail\RegistroMailable;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;   

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request; // Importar la fachada Request para la validación
use Illuminate\Support\Facades\Hash;


route::view('/login',"login")->name('login');
route::view('/registro',"registro")->name('registro');
route::view('/usuario',"usuario")->name('usuario');


 route::post('/registros',[logincontroller::class,'register'])->name('add_register');
 route::post('/iniciarsesion',[logincontroller::class,'login'])->name('started_session');
 route::get('/usuarios',[logincontroller::class,'logout'])->name('exited_session');



 route::get('pdf_establecimiento',[EstablecimientoController::class,'pdf'])->name('pdf_establecimiento');
 route::get('pdf_asistencias',[AsistenciasController::class,'pdf'])->name('pdf_asistencias');
 route::get('pdf_eventos',[EventosController::class,'pdf'])->name('pdf_eventos');


// Route::get('/activar/{id_establecimiento}/',[EstablecimientoController::class, 'activar'])->name('activar');
