<?php

namespace App\Http\Controllers;

use App\Models\asistencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class AsistenciasController extends Controller
{
  public function index()
  {

    return asistencias::all();
  }

  public function store(Request $request)
  {

    echo "Request data:\n";
    echo json_encode($request->all(), JSON_PRETTY_PRINT);

    // $request->validate([
    //     'id_asistencias'=>'required',
    //     'contacto'=>'required',
    //     'direccion'=>'required',
    //     'nombre'=>'required',
    //     'imagen'=>'required',
    // ]);
    $rutaServidor = '/home/dh_v99dvi/api.launionenamora.gov.co/';

    $imagenasistencia = $request->file('imagen');
    $imgasistencia = "";

    if ($imagenasistencia) {

      $imgasistencia = time() . '_' . $imagenasistencia->getClientOriginalName();

      $imagenasistencia->move($rutaServidor . 'imagenes/asistencias', $imgasistencia);
      $urlasistencia = asset('imagenes/asistencias/' . $imgasistencia);
    } else {
      $urlasistencia = null;
    }

    try {
      $asistencias = new asistencias;
      $asistencias->id_asistencias = $request->id_asistencias;
      $asistencias->contacto = $request->contacto;
      $asistencias->direccion = $request->direccion;
      $asistencias->nombre = $request->nombre;
      $asistencias->imagen = $urlasistencia;


      $asistencias->save();

      return response()->json([
        'mensaje' => "Datos enviados correctamente",

      ]);
    } catch (\Exception $e) {
      return response()->json([
        'error' => 'Error al guardar los datos: ' . $e->getMessage(),
      ], 500);
    }
  }

  public function show(asistencias $asistencias)
  {
    return $asistencias;
  }

  public function update(Request $request, asistencias $asistencias)
  {

    $request->validate([

      'contacto' => 'required',
      'direccion' => 'required',
      'nombre' => 'required',
    ]);


    try {
      $rutaServidor = '/home/dh_v99dvi/api.launionenamora.gov.co/';
      $asistencias = asistencias::findOrFail($request->id_asistencias);


      if ($request->imagen) {
        $ruta = $rutaServidor . 'imagenes/asistencias/' . $request->imagen;
        if (file_exists($ruta)) {
          unlink($ruta);
        }

        $imagenasistencia = $request->file('imagen');
        $imgasistencia = "";

        if ($imagenasistencia) {

          $imgasistencia = time() . '_' . $imagenasistencia->getClientOriginalName();

          $imagenasistencia->move($rutaServidor . 'imagenes/asistencias', $imgasistencia);
          $urlasistencia = asset('imagenes/asistencias/' . $imgasistencia);
        } else {
          $urlasistencia = null;
        }


        $asistencias->contacto = $request->contacto;
        $asistencias->direccion = $request->direccion;
        $asistencias->nombre = $request->nombre;

        $asistencias->save();

        return response()->json([
          'mensaje' => 'Asistencia actualizada correctamente!',
        ]);
      }
    } catch (\Exception $e) {
      return response()->json([
        'error' => 'Error al actualizar la asistencia: ' . $e->getMessage(),
      ], 500);
    }
  }


  public function destroy($id_asistencias)
  {
    $asistencias = asistencias::findOrFail($id_asistencias);
    if (!$asistencias) {
      return response()->json([
        'mensaje' => 'No se pudo eliminar el registro',
      ]);
    } else {
      $asistencias->delete();
      // return response()->noContent();
      return response()->json([
        'mensaje' => 'Registro eliminado exitosamente',
      ]);
    }
  }
  public function pdf()
  {
    $asistencias = asistencias::all();
    //mostrar pdf//
    $pdf = Pdf::loadView('pdfasistencias', [
      'asistencias' => $asistencias,
    ]);
    $filepath = public_path('pdf/asistencias.pdf');

    $pdf->save($filepath);

    return $pdf->stream('asistencias.pdf');
  }

  public function activar($id_asistencias)
  {

    try {
      $asistencias = asistencias::FindOrfail($id_asistencias);

      if ($asistencias->estados == 'inactivo') {

        $asistencias->estados = 'activo';
        $asistencias->save();
      } else {

        $asistencias->estados = 'inactivo';
        $asistencias->save();
      }

      return view('cerrar');
    } catch (\Exception $e) {
      return response()->json([
        'error' => 'Error al cambiar el estado de la asistencia: ' . $e->getMessage(),
      ], 500);
    }
  }
}
