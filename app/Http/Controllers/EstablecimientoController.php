<?php

namespace App\Http\Controllers;

use App\Models\establecimiento;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\RegistroMailable;
use Illuminate\Support\Facades\Mail;



class EstablecimientoController extends Controller
{

  public function index()
  {
    return establecimiento::all();
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // $request->validate([
    //     'nombre'=>'required',
    //     'instagram'=>'required',
    //     'direccion'=>'required',
    //     'contacto'=>'required',
    //     'descripcion'=>'required',
    //     'tipo_negocio'=>'required',
    //     'propietario'=>'required',
    //     'imagen'=>'required',
    // ]);



    $logo = $request->file('imagen');

    if ($logo) {

      $Imagenlogo = time() . '_' . $logo->getClientOriginalName();

      $logo->move(public_path('imagenes/establecimientos/'), $Imagenlogo);
      $urllogo = asset('imagenes/establecimientos/' . $Imagenlogo);
    } else {
      $urllogo = null;
    }



    try {

      $establecimiento = new establecimiento;
      $establecimiento->id_establecimiento = $request->id_establecimiento;
      $establecimiento->nombre = $request->nombre;
      $establecimiento->instagram = $request->instagram;
      $establecimiento->direccion = $request->direccion;
      $establecimiento->contacto = $request->contacto;
      $establecimiento->descripcion = $request->descripcion;
      $establecimiento->tipo_negocio = $request->tipo_negocio;
      $establecimiento->propietario = $request->propietario;
      $establecimiento->imagen = $urllogo;

      $establecimiento->save();

      Mail::to('sbarrientosf12@gmail.com')->send(new RegistroMailable($establecimiento));
    } catch (\Exception $e) {
      return response()->json([
        'error' => 'Error al guardar el establecimiento: ' . $e->getMessage(),
      ], 500);
    }
  }


  public function show(establecimiento $establecimiento)
  {
    return $establecimiento;
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, establecimiento $establecimiento)
  {
    // return $request; 

    $request->validate([
      'nombre' => 'required',
      'instagram' => 'required',
      'direccion' => 'required',
      'contacto' => 'required',
      'descripcion' => 'required',
      'tipo_negocio' => 'required',
      'imagen' => 'required|image',
      'propietario' => 'required',
    ]);

    echo "Request data:\n";
    echo json_encode($request->all(), JSON_PRETTY_PRINT);

    try {

      $establecimiento = establecimiento::findOrFail($request->id_establecimiento);

      $request->headers->set('Content-Type', 'multipart/form-data');


      if ($request->imagen) {
        $ruta = public_path('imagenes/establecimientos/') . $request->imagen;
        if (file_exists($ruta)) {
          unlink($ruta);
        }
      }

      $logo = $request->file('imagen');

      if ($logo) {

        $Imagenlogo = time() . '_' . $logo->getClientOriginalName();

        $logo->move(public_path('imagenes/establecimientos/'), $Imagenlogo);
        $urllogo = asset('imagenes/establecimientos/' . $Imagenlogo);
      } else {
        $urllogo = null;
      }


      $establecimiento->nombre = $request->nombre;
      $establecimiento->instagram = $request->instagram;
      $establecimiento->direccion = $request->direccion;
      $establecimiento->contacto = $request->contacto;
      $establecimiento->descripcion = $request->descripcion;
      $establecimiento->tipo_negocio = $request->tipo_negocio;
      $establecimiento->imagen = $urllogo;
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
  }
  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id_establecimiento)

  {

    $establecimiento = establecimiento::findOrFail($id_establecimiento);
    if (!$establecimiento) {
      return response()->json([
        'mensaje' => 'No se pudo eliminar el registro',
      ]);
    } else {
      $establecimiento->delete();
      // return response()->noContent();
      return response()->json([
        'mensaje' => 'Registro eliminado exitosamente',
      ]);
    }
  }



  public function pdf()
  {
    $establecimientos = establecimiento::all();

    //cantidad de establecimientos
    $totalestablecimiento = establecimiento::count();

    //establecimientos activos
    //mostrar pdf//
    $pdf = Pdf::loadView('pdfestablecimientos', [
      'establecimientos' => $establecimientos,
      'totalestablecimiento' => $totalestablecimiento,

    ]);
    $filepath = public_path('pdf/establecimientos.pdf');

    $pdf->save($filepath);

    return $pdf->stream('establecimientos.pdf');
  }

  public function activar($id_establecimiento)
  {

    try{
      $establecimiento = establecimiento::FindOrfail($id_establecimiento);

    $establecimiento->estados = 'activo';
    $establecimiento->save();

      return view('cerrar');

    }catch (\Exception $e) {
      return response()->json([
        'error' => 'Error al activar el establecimiento: ' . $e->getMessage(),
      ], 500);
  }
}
}