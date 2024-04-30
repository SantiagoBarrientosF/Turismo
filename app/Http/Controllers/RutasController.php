<?php

namespace App\Http\Controllers;

use App\Models\establecimiento;
use App\Models\rutas;
use Illuminate\Http\Request;


class RutasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(rutas $rutas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,establecimiento $establecimiento)
    {
        // $valor = establecimiento::findOrFail($request->id_establecimientos);

        // if($valor==true){
        //     $establecimiento->update([
        //         'nombre' => $request->nombre,
        //         'localidad' => $request->localidad,
        //         'direccion' => $request->direccion,
        //         'contacto' => $request->contacto,
        //         'descripcion' => $request->descripcion,
        //         'tipo_negocio' => $request->tipo_negocio,
        //         'propietario' => $request->propietario,
        //     ]);
        // }else{
        //     return response()->json([
        //         'sapo'=>['me vo´ a matar',404]
        //     ]);
        // }

        // try{
        // $establecimiento = $establecimiento::find($request->id_establecimiento);

        // $establecimiento->update([
        //              'nombre' => $request->nombre,
        //              'localidad' => $request->localidad,
        //              'direccion' => $request->direccion,
        //              'contacto' => $request->contacto,
        //              'descripcion' => $request->descripcion,
        //              'tipo_negocio' => $request->tipo_negocio,
        //              'propietario' => $request->propietario,
        //          ]);

        //          return response()->json([
        //             'sapo'=>'Aleluya',
        //          ]);
        // }catch(\exception){
        //     return response()->json([
        //         'sapo'=>['Matese',404]
        //     ]);
        // }

        // try  {

        //   $establecimiento = $establecimiento::findOrfail($request->id_establecimiento);
        //   $establecimiento->nombre -> $request->nombre;
        //   $establecimiento->localidad -> $request->localidad;
        //   $establecimiento->direccion -> $request->direccion;
        //   $establecimiento->contacto -> $request->contacto;
        //   $establecimiento->descripcion -> $request->descripcion;
        //   $establecimiento->tipo_negocio -> $request->tipo_negocio;
        //   $establecimiento->propietario -> $request->propietario;

        //     $establecimiento->update();

        //              return response()->json([
        //                 'sapo'=>'Aleluya',
        //              ]);
        //     }catch(\exception){
        //         return response()->json([
        //             'sapo'=>['Matese',404]
        //         ]);
        //     }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rutas $rutas)
    {
        //
    }
}

