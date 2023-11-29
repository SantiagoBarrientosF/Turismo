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
    $request->validate([
        'nombre'=>'required',
        'localidad'=>'required',
        'direccion'=>'required',
        'telefono'=>'required',
        'descripcion'=>'required',
        'tipo_negocio'=>'required',
        'propietario'=>'required',
        'logo'=>'required',
        'redes_id'=>'required',
        'detalle'=>'required',


    ]);
        $logo= $request->file['logo'];

        $nombreImagen = time() . '_' . $logo->getClientOriginalName();

        $logo ->move(public_path('imagenes/establecimientos'), $nombreImagen);
        $urlImagen = asset('imagenes/establecimientos' . $nombreImagen);


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
        $establecimiento->logo =$urlImagen;
        $establecimiento->redes_id =$request->redes_id;
        $establecimiento->detalle =$request->detalle;

        $establecimiento->save();
        return $establecimiento;
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
