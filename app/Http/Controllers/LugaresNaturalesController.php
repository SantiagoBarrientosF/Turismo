<?php

namespace App\Http\Controllers;

use App\Models\lugares_naturales;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LugaresNaturalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return lugares_naturales::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imagenlnaturales= $request->file('imagen');
        $imglugares ="";
        /*
        Condicional if encargado de verificar que se este enviando una imagen
        */

        if($imagenlnaturales){
            // Se encarga de generar un nombre a la imagen en base al tiempo
            $imglugares = time() . '_' . $imagenlnaturales-> getClientOriginalName();
            //Se envia la imagen a una carpeta publica
            $imagenlnaturales->move(public_path('imagenes/lugares_naturales/'), $imglugares);
            //asigna una url a la imagen enviada
            $urllnaturales = asset('imagenes/lugares_naturales'. $imglugares);
        }else{
            //En caso de no encontrar imagen se enviara un valor nulo
            $urllnaturales = null;
        }


        $L_naturales= new lugares_naturales;
        $L_naturales ->id_lugar = $request ->id_lugar;
        $L_naturales ->distancia = $request ->distancia;
        $L_naturales ->nombre = $request ->nombre;
        $L_naturales ->imagen = $urllnaturales;
      

        $L_naturales->save();
        return response()->json([
            'mensaje' =>"imagen enviada correctamente",

        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(lugares_naturales $lugares_naturales)
    {
        return $lugares_naturales;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,lugares_naturales $L_naturales, lugares_naturales $lugares_naturales)
    {
        
        try{
            $asistencias = lugares_naturales::findOrFail($request->id_lugar);
            $imagenlnaturales= $request->file('imagen');
            $imglugares ="";
            /*
            Condicional if encargado de verificar que se este enviando una imagen
            */
            if ($request->imagen) {
                $ruta = public_path('imagenes/establecimientos/') . $request->imagen;
                if (file_exists($ruta)) {
                  unlink($ruta);
                }
              }

            if($imagenlnaturales){
                // Se encarga de generar un nombre a la imagen en base al tiempo
                $imglugares = time() . '_' . $imagenlnaturales-> getClientOriginalName();
                //Se envia la imagen a una carpeta publica
                $imagenlnaturales->move(public_path('imagenes/lugares_naturales/'), $imglugares);
                //asigna una url a la imagen enviada
                $urllnaturales = asset('imagenes/lugares_naturales'. $imglugares);
            }else{
                //En caso de no encontrar imagen se enviara un valor nulo
                $urllnaturales = null;

            }

        $L_naturales ->id_lugar = $request ->id_lugar;
        $L_naturales ->distancia = $request ->distancia;
        $L_naturales ->nombre = $request ->nombre;
        $L_naturales ->imagen = $urllnaturales;
      
     $asistencias->save();
            return response()->json([
              'mensajerecibido'=>'Datos actualizados correctamente',
          ]);

        }catch (\Exception $e){
           return response()->json([
              'mensaje'=>'No se puede actualizar',
           ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lugares_naturales $lugares_naturales)
    {
        // lugares_naturales::find($id)->delete();
    }

    public function pdf(){

        $L_naturales = lugares_naturales::all();
        //mostrar pdf//
        $pdf = Pdf::loadView('l_naturales.pdf', compact('establecimiento'));
        //descargar pdf//
        return $pdf->download('lugares_naturales.pdf');

    }
}
