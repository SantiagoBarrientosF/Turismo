<?php


use App\Http\Controllers\AsistenciasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalificacionesController;
use App\Http\Controllers\EstablecimientoController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\ExperienciasController;
use App\Http\Controllers\ImagenesController;
use App\Http\Controllers\LugaresNaturalesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Mail\RegistroMailable;
use Illuminate\Support\Facades\Mail;

route::apiResource('establecimiento',EstablecimientoController::class);
Route::post('updatestablecimiento/{id_establecimiento}',[EstablecimientoController::class,'update']);
Route::post('updateventos/{id_eventos}',[EventosController::class,'update']);
Route::post('updateasistencias/{id_asistencias}',[AsistenciasController::class,'update']);
Route::post('updateindex/{id_index}',[IndexController::class,'update']);
Route::post('establecimientos',[EstablecimientoController::class,'store']);

route::apiResource('asistencia',AsistenciasController::class);
route::apiResource('imagen',ImagenesController::class);
route::apiResource('calificacion',CalificacionesController::class);
route::apiResource('eventos',EventosController::class);
route::apiResource('experiencia',ExperienciasController::class);
route::apiResource('l_naturales',LugaresNaturalesController::class);
route::post('start',[AuthController::class,'login'])->name('start_session');
route::get('end',[AuthController::class,'logout'])->name('exit_session');
Route::middleware('auth:sanctum')->get('users', [UserController::class,'getuser']);
route::apiResource('index',IndexController::class);
