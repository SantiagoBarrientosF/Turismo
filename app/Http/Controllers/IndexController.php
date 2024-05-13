<?php

namespace App\Http\Controllers;

use App\Models\index;
use Illuminate\Http\Request;

class IndexController extends Controller
{
  public function index(request $request)
  {


    return index::all();
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $rutaServidor = '/home/dh_v99dvi/api.launionenamora.gov.co/';


    $imagenindex = $request->file('imagen');
    $imgindex = "";

    if ($imagenindex) {

      $imgindex = time() . '_' . $imagenindex->getClientOriginalName();

      $imagenindex->move($rutaServidor . 'imagenes/index/', $imgindex);
      $urlindex = asset('imagenes/index/' . $imgindex);
    } else {
      $urlindex = null;
    }

    $index = new index;

    $index->id_index = $request->id_index;
    $index->titulo = $request->titulo;
    $index->imagen = $urlindex;
    $index->categoria = $request->categoria;
    $index->descripcion = $request->descripcion;

    $index->save();
  }

  /**
   * Display the specified resource.
   */
  public function show(index $index)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, index $index, $id_index)
  {
    $request->validate([
      'titulo' => 'required',
      'descripcion' => 'required',
      'imagen' => 'nullable|image',
      'categoria' => 'required',
    ]);

    try {
    
      $rutaServidor = '/home/dh_v99dvi/api.launionenamora.gov.co/';
      $index = index::findOrFail($id_index);

      $request->headers->set('Content-Type', 'multipart/form-data');


      if ($request->imagen) {
        $ruta = $rutaServidor.'imagenes/index/' . $request->imagen;
        if (file_exists($ruta)) {
          unlink($ruta);
        }
      }

      $imagenindex = $request->file('imagen');

      if ($imagenindex) {

        $imgindex = time() . '_' . $imagenindex->getClientOriginalName();

        $imagenindex->move($rutaServidor.'imagenes/index/', $imgindex);
        $urlindex = asset('imagenes/index/' . $imgindex);
      } else {
        $urlindex = null;
      }


      $index->titulo = $request->titulo;
      $index->imagen = $urlindex;
      $index->categoria = $request->categoria;
      $index->descripcion = $request->descripcion;


      $index->save();

      return response()->json([
        'mensaje' => 'Index actualizado correctamente!',
      ]);
    } catch (\Exception $e) {
      return response()->json([
        'error' => 'Error al actualizar el index: ' . $e->getMessage(),
      ], 500);
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(index $index)
  {
  }

  public function activar($id_index)
  {

    try {

      $index = index::FindOrfail($id_index);

      if ($index->estados == 'inactivo') {

        $index->estados = 'activo';
        $index->save();
      } else {

        $index->estados = 'inactivo';
        $index->save();
      }

      return view('cerrar');
    } catch (\Exception $e) {
      return response()->json([
        'error' => 'Error al cambiar el estado del indice: ' . $e->getMessage(),
      ], 500);
    }
  }
}
