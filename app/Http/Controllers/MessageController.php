<?php

namespace App\Http\Controllers;

use App\Mail\mensajerecibido;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $msg)
{
    $msg->validate([
        'nombre'=>'required',
        'correo'=>'required[email]',
        'contraseña'=>'required',


    ]);
    //Mail::to('sbarrientosf12@gmail.com')->send(new mensajerecibido($msg));


}
//
}

