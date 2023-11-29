<?php

use App\Console\Commands\ListApiRoutes;
use App\Http\Controllers\AsistenciasController;
use App\Http\Controllers\CalificacionesController;
use App\Http\Controllers\EstablecimientoController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\ExperienciasController;
use App\Http\Controllers\ImagenesController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

route::apiResource('establecimiento',EstablecimientoController::class);
route::apiResource('asistencia',AsistenciasController::class);
route::apiResource('imagen',ImagenesController::class);
route::apiResource('calificacion',CalificacionesController::class);
route::apiResource('eventos',EventosController::class);
route::apiResource('experiencia',ExperienciasController::class);
route::apiResource('usuarios',UsuariosController::class);
//route::apiResource('api',ListApiRoutes::class);

