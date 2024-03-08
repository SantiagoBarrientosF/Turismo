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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use app\Http\Controllers\LoginController;

route::apiResource('establecimiento',EstablecimientoController::class);
route::apiResource('asistencia',AsistenciasController::class);
route::apiResource('imagen',ImagenesController::class);
route::apiResource('calificacion',CalificacionesController::class);
route::apiResource('eventos',EventosController::class);
route::apiResource('experiencia',ExperienciasController::class);
route::apiResource('l_naturales',LugaresNaturalesController::class);
Route::get('lugares_naturales',([LugaresNaturalesController::class]));
route::post('start',[AuthController::class,'login'])->name('start_session');
route::get('end',[AuthController::class,'logout'])->name('exit_session');
Route::middleware('auth:sanctum')->get('users', [UserController::class,'getuser']);
