<?php

namespace App\Http\Controllers;

use App\Mail\mensajerecibido;
use App\Models\establecimiento;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

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

        // $request->validate([
        //     'id_establecimiento'=>'required',
        //     'nombre'=>'required',
        //     'localidad'=>'required',
        //     'direccion'=>'required',
        //     'contacto'=>'required',
        //     'descripcion'=>'required',
        //     'tipo_negocio'=>'required',
        //     'propietario'=>'required',
        //     'imagen'=>'required',



        // ]);



        $logo = $request->file('imagen');

        if($logo){

            $Imagenlogo = time() . '_' . $logo-> getClientOriginalName();

            $logo->move(public_path('imagenes/establecimientos/'), $Imagenlogo);
            $urllogo = asset('imagenes/establecimientos/'. $Imagenlogo);
        }else{
            $urllogo = null;
        }




        $establecimiento = new establecimiento;
        $establecimiento->id_establecimiento=$request->id_establecimiento;
        $establecimiento->nombre =$request->nombre;
        $establecimiento->localidad =$request->localidad;
        $establecimiento->direccion =$request->direccion;
        $establecimiento->contacto =$request->contacto;
        $establecimiento->descripcion =$request->descripcion;
        $establecimiento->tipo_negocio =$request->tipo_negocio;
        $establecimiento->propietario =$request->propietario;
        $establecimiento->id_usuario =$request->id_usuario;
        $establecimiento->id_estado =$request->id_estado;
        $establecimiento->imagen =$urllogo;
        $establecimiento->redes_id =$request->redes_id;


        $establecimiento->save();

        return response()->json([
            'mensaje' => 'datos enviados correctamente',

        ]);
    }


    public function show(establecimiento $establecimiento)
    {
        return $establecimiento;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,establecimiento $establecimiento)
    {


            $request->validate([
                'nombre' => 'required',
                'localidad' => 'required',
                'direccion' => 'required',
                'contacto' => 'required',
                'descripcion' => 'required',
                'tipo_negocio' => 'required',
                'propietario' => 'required',
            ]);

            echo "Request data:\n";
            echo json_encode($request->all(), JSON_PRETTY_PRINT);

            try {
                $establecimiento->nombre = $request->nombre;
                $establecimiento->localidad = $request->localidad;
                $establecimiento->direccion = $request->direccion;
                $establecimiento->contacto = $request->contacto;
                $establecimiento->descripcion = $request->descripcion;
                $establecimiento->tipo_negocio = $request->tipo_negocio;
                $establecimiento->propietario = $request->propietario;

                $establecimiento->save();

                return response()->json([
                  'mensaje' => 'Establecimiento actualizado correctamente!',
                ]);
              } catch (\Exception $e) {
                return response()->json([
                  'error' => 'Error al actualizar el establecimiento: ' . $e->getMessage(),
                ], 500);
              }



            // return $request;


    }
    /**
     * Remove the specified resource from storage.
     */
   public function destroy(establecimiento $establecimiento)

   {
    $establecimiento->delete();
    return response()->noContent();


   }

    public function pdf(){
   $establecimento = establecimiento::all();
   //mostrar pdf//
   $pdf = Pdf::loadView('pdfasistencias');
   $filepath=public_path('pdf/establecimientos.pdf');

     $pdf->save($filepath);

    return $pdf->stream('establecimientos.pdf');
     }

     public function vistapdf(){
          $vistapdf = establecimiento::all();

          return view('pdfestablecimientos',['establecimientos'=>$vistapdf]);

      }


    }





            // if($request->imagen){
            // $ruta=public_path('imagenes/establecimientos/').$request->imagen;
            //   if(file_exists($ruta)){
            //     unlink($ruta);
            //   }
            // }

            // $logo = $request->file('imagen');

            // if($logo){

            //     $Imagenlogo = time() . '_' . $logo-> getClientOriginalName();

            //     $logo->move(public_path('imagenes/establecimientos/'), $Imagenlogo);
            //     $urllogo = asset('imagenes/establecimientos/'. $Imagenlogo);
            // }else{
            //     $urllogo = null;
            // }




