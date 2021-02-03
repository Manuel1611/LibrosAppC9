<?php

namespace App\Http\Controllers;

use App\Models\Ventas;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    
    public function index()
    {
        return response()->json(Ventas::all(), 200);
    }
   
    public function store(Request $request)
    {
        try {
            
            $ventas = Ventas::create($request->all());
            return response()->json($ventas->id, 200);
            
        } catch (\Exception $e) {
            return response()->json(0, 200);
        }
        
    }


    public function show($id)
    {
        return response()->json(Ventas::find($id), 200);
    }

    public function update(Request $request, $id)
    {
        try{
            
        $ventas = Ventas::find($id);
        $resultado = $ventas->update($request->all());

        return response()->json(["resultado" => $resultado], 200);
        
        } catch (\Exception $e) {
             return response()->json(["resultado" => false], 200);
        }
    }

    public function destroy($id)
    {
        try {
        
        $ventas = Ventas::find($id);
        
        if($ventas != null) {
            $resultado = $ventas->delete();
            return response()->json(["resultado" => $resultado], 200);
        
        }
        
        } catch (\Exception $e) {
            return response()->json(["resultado" => false], 200);
        }
    }
}
