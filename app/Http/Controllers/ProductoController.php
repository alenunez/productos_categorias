<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;


class ProductoController extends Controller
{
    public function index()
    {
        $producto = Producto::all();
        return response()->json($producto);
    }

    public function store(Request $request)
    {
        $producto= Producto::create($request->post());

        return response()->json([           
            'producto'=>$producto
        ]);   
    }
    public function storeByCategoria(Request $request,$id_categoria)
    {
        $producto= Producto::create($request->post());
        $producto->id_categoria =$id_categoria->save();

        return response()->json([           
            'producto'=>$producto
        ]);   
    } 

    public function findById($id){
     /*   $prod = new Producto();
        $productoList = Producto::all();
        $size = count($productoList);
        for($i=0;$i<$size;$i++){
            if($productoList[$i]->id == $id){
                $prod = $productoList[$i];
            }
        }*/
        $prod = Producto::findOrFail($id);
        return response()->json(         
            $prod
        );
    }

    public function prueba(){
        $producto = Producto::all();
        $size = count($producto);
        $num = 3;
        $tipo = gettype($producto);

        return response()->json([           
            'producto'=>$producto[0]->id_descripcion
        ]);

    }
    public function update(Request $request, $id)
    {
        $prod = Producto::findOrFail($id);
        $prod->id=$id;
        $prod->descripcion=$request->descripcion;
        $prod->id_categoria=$request->id_categoria;
        $prod->save();
        return response()->json([           
            $prod
        ]);
    }
    public function destroy($id){
        $prod = Producto::findOrFail($id);
        $prod->delete();
        return response()->json([
            'mensaje'=>'producto eliminado'
        ]);
    }

   // public function anexadult($idguest,$idbook,$idroom){
   //     $idguest =Guests::find($idguest);
  //      $idbook = Books::find($idbook);
  //      $idroom = Rooms::find($idroom);
  //      return view("agregar_organizador2",array("idguest"=>$idguest,"idbook"=>$idbook,"idroom"=>$idroom));     
 // }
    
}
