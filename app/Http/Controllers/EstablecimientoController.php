<?php

namespace App\Http\Controllers;

use App\Models\establecimiento;
use Illuminate\Http\Request;

class EstablecimientoController extends Controller
{

    public function index()
    {
        return establecimiento::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){


        $logo = $request->file('logo');

        if($logo){

            $Imagenlogo = time() . '_' . $logo-> getClientOriginalName();

            $logo->move(public_path('imagenes'), $Imagenlogo);
            $urllogo = asset('imagenes/'. $Imagenlogo);
        }else{
            $urllogo = null;
        }




        $establecimiento = new establecimiento;
        $establecimiento->id_establecimiento=$request->id_establecimiento;
        $establecimiento->nombre =$request->nombre;
        $establecimiento->localidad =$request->localidad;
        $establecimiento->direccion =$request->direccion;
        $establecimiento->telefono =$request->telefono;
        $establecimiento->descripcion =$request->descripcion;
        $establecimiento->tipo_negocio =$request->tipo_negocio;
        $establecimiento->propietario =$request->propietario;
        $establecimiento->id_usuario =$request->id_usuario;
        $establecimiento->id_estado =$request->id_estado;
        $establecimiento->logo =$urllogo;
        $establecimiento->redes_id =$request->redes_id;
        $establecimiento->detalle =$request->detalle;

        $establecimiento->save();

        return response()->json([
            'success' => true,
            'message' => 'Establecimiento creado correctamente',
            'imagen' => $Imagenlogo,
        ]);
    }


    public function show(establecimiento $establecimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, establecimiento $establecimiento)
    {
        $establecimiento = new establecimiento;
        $establecimiento-> id_establecimiento=$request->id_establecimiento;
        $establecimiento->nombre =$request->nombre;
        $establecimiento->localidad =$request->localidad;
        $establecimiento->direccion =$request->direccion;
        $establecimiento->telefono =$request->telefono;
        $establecimiento->descripcion =$request->descripcion;
        $establecimiento->tipo_negocio =$request->tipo_negocio;
        $establecimiento->propietario =$request->propietario;
        $establecimiento->id_usuario =$request->id_usuario;
        $establecimiento->id_estado =$request->id_estado;
        $establecimiento->logo =$request->logo;
        $establecimiento->redes_id =$request->redes_id;
        $establecimiento->detalle =$request->detalle;

        $establecimiento->update();
        return $establecimiento;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(establecimiento $establecimiento)
    {
        //
    }
}
