<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;


class CategoriaController extends Controller
{
    public function index()
    {
        $categoria = Categoria::all();
        return response()->json($categoria);
    }
    public function store(Request $request)
    {
        $categoria= Categoria::create($request->post());
        return response()->json([           
            'categoria'=>$categoria
        ]);   
    }
}
