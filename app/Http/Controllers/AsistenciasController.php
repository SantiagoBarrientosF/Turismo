<?php

namespace App\Http\Controllers;

use App\Models\asistencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class AsistenciasController extends Controller
{
    public function index(){

        return asistencias::all();



    }

    public function store(Request $request){

        // $request->validate([
        //     'id_asistencias'=>'required',
        //     'contacto'=>'required',
        //     'direccion'=>'required',
        //     'nombre'=>'required',
        //     'imagen'=>'required|image|mimes:jpeg,png,jpg,gif|'


        // ]);


        $imagenasistencia = $request->file('imagen');
        $imgasistencia = "";

        if($imagenasistencia){

            $imgasistencia = time() . '_' . $imagenasistencia-> getClientOriginalName();

            $imagenasistencia->move(public_path('imagenes/asistencias'), $imgasistencia);
            $urlasistencia = asset('imagenes/asistencias/'. $imgasistencia);

        }else{
            $urlasistencia = null;
        }

        $asistencias = new asistencias;
        $asistencias ->id_asistencias = $request ->id_asistencias;
        $asistencias ->contacto = $request ->contacto;
        $asistencias ->direccion = $request ->direccion;
        $asistencias ->nombre = $request ->nombre;
        $asistencias ->imagen = $urlasistencia;
        $asistencias ->id_estado = $request ->id_estado;

        $asistencias->save();

        return response()->json([
        'mensaje' => "Datos enviados correctamente",

        ]);

    }

    public function show(asistencias $asistencias){
        return $asistencias;

    }

    public function update(Request $request, asistencias $asistencias,$id_asistencias)
    {

         $request->validate([

            'contacto'=>'required',
            'direccion'=>'required',
            'nombre'=>'required',
        ]);
        echo "Request data:\n";
        echo json_encode($request->all(), JSON_PRETTY_PRINT);

        try{
            $asistencias = asistencias::findOrFail($id_asistencias);

            $asistencias ->contacto = $request ->contacto;
            $asistencias ->direccion = $request ->direccion;
            $asistencias ->nombre = $request ->nombre;

            $asistencias->update();

            return response()->json([
                'mensaje' => 'Asistencia actualizada correctamente!',
              ]);

        }catch(\Exception $e) {
            return response()->json([
              'error' => 'Error al actualizar la asistencia: ' . $e->getMessage(),
            ], 500);
        }





        // echo "Request data:\n";
        // echo json_encode($request->all(), JSON_PRETTY_PRINT);

        return response()->json([
            'message'=>'Asistencia actualizada correctamente',
        ]);




    }


    public function destroy(asistencias $asistencias)
    {
        $asistencias->delete();
        return response()->noContent();

    }
    public function pdf(){
        $asistencias = asistencias::all();
        //mostrar pdf//
         $pdf = Pdf::loadView('pdfasistencias');
         $filepath=public_path('pdf/asistencias.pdf');

         $pdf->save($filepath);

        return $pdf->stream('asistencias.pdf');
        }

        public function vistapdf(){
            $vistapdf = asistencias::all();

            return view('pdfasistencias',['eventos'=>$vistapdf]);

        }
}
