<?php

namespace App\Http\Controllers;

use App\Models\eventos;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class EventosController extends Controller
{

  public function index()
  {

    $registros = eventos::where('fecha', '>', Carbon::now())->get();

    return $registros;
  }


  public function store(Request $request)
  {

    // $request->validate([
    //     'nombre'=>'required',
    //     'fecha'=>'required',
    //     'descripcion'=>'required',
    //     'aforo'=>'required',
    //     'tipo_evento'=>'required',
    //     'contacto'=>'required',
    //     'imagen'=>'required',


    // ]);


    $rutaServidor = '/home/dh_v99dvi/api.launionenamora.gov.co/';

    $imagen = $request->file('imagen');

    if ($imagen) {

      $imagenevento = time() . '_' . $imagen->getClientOriginalName();

      $imagen->move($rutaServidor . 'imagenes/Eventos/', $imagenevento);
      $urlevento = asset('imagenes/Eventos/' . $imagenevento);
    } else {
      $urlevento = null;
    }

    try {

      $eventos = new eventos;
      $eventos->id_eventos = $request->id_eventos;
      $eventos->nombre = $request->nombre;
      $eventos->fecha = $request->fecha;
      $eventos->descripcion = $request->descripcion;
      $eventos->aforo = $request->aforo;
      $eventos->tipo_evento = $request->tipo_evento;
      $eventos->contacto = $request->contacto;
      $eventos->imagen = $urlevento;
      $eventos->id_estado = $request->id_estado;

      $eventos->save();

      return response()->json([
        'mensaje' => 'datos guardados correctamente',
      ]);
    } catch (\Exception $e) {
      return response()->json([
        'error' => 'Error al guardar los eventos: ' . $e->getMessage(),
      ], 500);
    }
  }
  /*
     * Display the specified resource.
     */
  public function show(eventos $registros)
  {
    return $registros;
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, eventos $eventos)
  {
    $request->validate([
      'nombre' => 'required',
      'fecha' => 'required',
      'descripcion' => 'required',
      'aforo' => 'required',
      'tipo_evento' => 'required',
      'contacto' => 'required',



    ]);

    echo "Request data:\n";
    echo json_encode($request->all(), JSON_PRETTY_PRINT);

    try {
      
      $rutaServidor = '/home/dh_v99dvi/api.launionenamora.gov.co/';


      $eventos = eventos::findOrFail($request->id_eventos);

      if ($request->imagen) {
        $ruta = $rutaServidor . 'imagenes/eventos/' . $request->imagen;
        if (file_exists($ruta)) {
          unlink($ruta);
        }

        $imagen = $request->file('imagen');

        if ($imagen) {

          $imagenevento = time() . '_' . $imagen->getClientOriginalName();
    
          $imagen->move($rutaServidor . 'imagenes/Eventos/', $imagenevento);
          $urlevento = asset('imagenes/Eventos/' . $imagenevento);
        } else {
          $urlevento = null;
        }
      }
      $eventos->nombre = $request->nombre;
      $eventos->fecha = $request->fecha;
      $eventos->descripcion = $request->descripcion;
      $eventos->aforo = $request->aforo;
      $eventos->descripcion = $request->descripcion;
      $eventos->tipo_evento = $request->tipo_evento;
      $eventos->contacto = $request->contacto;
      $eventos->imagen = $urlevento;

      $eventos->save();

      return response()->json([
        'mensaje' => 'Evento actualizado correctamente!',
      ]);
    } catch (\Exception $e) {
      return response()->json([
        'error' => 'Error al actualizar el evento: ' . $e->getMessage(),
      ], 500);
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id_eventos)
  {
    $eventos = eventos::findOrFail($id_eventos);
    if (!$eventos) {
      return response()->json([
        'mensaje' => 'No se pudo eliminar el registro',
      ]);
    } else {
      $eventos->delete();

      return response()->json([
        'mensaje' => 'Registro eliminado exitosamente',
      ]);
    }
  }


  public function pdf()
  {
    $eventos = eventos::all();
    $totaleventos = eventos::count();
    $pdf = PDF::loadView('pdfeventos', [
      'eventos' => $eventos,
      'totaleventos' => $totaleventos,
    ]); // Carga la vista 'pdfeventos' y genera el PDF
    $filePath = public_path('pdf/eventos.pdf'); // Ruta completa al archivo PDF

    // Guarda el PDF en la ubicación especificada
    $pdf->save($filePath);

    // Transmite el archivo PDF para su descarga con el nombre 'evento.pdf'
    return $pdf->stream('evento.pdf');

    //return $pdf->download('Eventos.pdf');
  }

  public function activar($id_eventos)
  {

    try {

      $eventos = eventos::FindOrfail($id_eventos);

      if ($eventos->estados == 'inactivo') {

        $eventos->estados = 'activo';
        $eventos->save();
      } else {

        $eventos->estados = 'inactivo';
        $eventos->save();
      }

      return view('cerrar');
    } catch (\Exception $e) {
      return response()->json([
        'error' => 'Error al cambiar el estado del evento: ' . $e->getMessage(),
      ], 500);
    }
  }
}
