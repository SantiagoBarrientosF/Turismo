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

        $imagenindex = $request->file('imagen');
        $imgindex = "";

        if($imagenindex){

            $imgindex = time() . '_' . $imagenindex-> getClientOriginalName();

            $imagenindex->move(public_path('imagenes/index/'), $imgindex);
            $urlindex = asset('imagenes/index/'. $imgindex);

        }else{
            $urlindex = null;
        }

        $index= new index;

        $index->id_index=$request->id_index;
        $index->titulo=$request->titulo;
        $index->imagen=$urlindex;
        $index->categoria=$request->categoria;
        $index->descripcion=$request->descripcion;

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
    public function update(Request $request, index $index,$id_index)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'imagen'=>'nullable|image',
            'categoria' => 'required',
             ]);
    
        try {

            $index = index::findOrFail($id_index);
      
            $request->headers->set('Content-Type', 'multipart/form-data');
      
      
            if ($request->imagen) {
              $ruta = public_path('imagenes/index/') . $request->imagen;
              if (file_exists($ruta)) {
                unlink($ruta);
              }
            }
      
            $imagenindex = $request->file('imagen');
      
            if ($imagenindex) {
      
              $imgindex = time() . '_' . $imagenindex->getClientOriginalName();
      
              $imagenindex->move(public_path('imagenes/index/'), $imgindex);
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
}
