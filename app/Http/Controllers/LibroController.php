<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Ventas;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    
    public function index()
    {
        return response()->json(Libro::all(), 200);
    }

    public function store(Request $request)
    {
        try {
            
            $libro = Libro::create($request->all());
            return response()->json($libro->id, 200);
            
        } catch (\Exception $e) {
            return response()->json(0, 200);
        }
        
    }

 
    public function show($id)
    {
        return response()->json(Libro::find($id), 200);
    }
   
    public function update(Request $request, $id)
    {
        try{
            
        $libro = Libro::find($id);
        $resultado = $libro->update($request->all());

        return response()->json($resultado, 200);
        
        } catch (\Exception $e) {
             return response()->json(false, 200);
        }
    }

    public function destroy($id)
    {
        try {
        
        $libro = Libro::find($id);
        
        /*if($libro != null) {
            $resultado = $libro->delete();
            return response()->json($resultado, 200);
        
        }*/
        
        if($libro->ventas != null) {
            
            foreach($libro->ventas as $venta) {
                
                Ventas::destroy($venta->id);
                
            }
            $num = Libro::destroy($id);
            
            if($num == 1) {
                
                $resultado = true;
                
            } else {
                
                $resultado = false;
                
            }
            
            return response()->json($resultado, 200);
            
        }
        
        } catch (\Exception $e) {
            return response()->json($resultado, 200);
        }
    }
}
