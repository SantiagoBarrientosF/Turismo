<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('hola', function () {
    return '<a href=>Sapo<a><br>';
    //return '<a href=>Sapo<a><br>';
    //return '<a href=>Sapo<a><br>';
    //return '<a href=>Sapo<a><br>';
    //return '<a href=>Sapo<a><br>';
    //return '<a href=>Sapo<a><br>';
//})->name('contacto');
//route::get('hello', function(){
    //return view('welcome');
//});
Route::view('login', 'login');

Route::post('login', function(){

    $credentials = request()->only('correo', 'contrasena');

    if(Auth::attempt($credentials)){
    return response()->json([
        'mensaje'=>'ingreso correctamente',
    ]);
    }else{
        return response()->json([
            'mensaje'=>'inicio de sesion fallido',
        ]);
    }
});
