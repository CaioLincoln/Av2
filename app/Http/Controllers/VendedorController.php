<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedor;

class VendedorController extends Controller
{
    public function index(){

        $vendedores = Vendedor::all();
        return view('vendedor',['vendedores' => $vendedores]);
    }

    public function store(Request $request){
        
        $vendedor = new Vendedor;
        $vendedor ->nome = $request->nome;
        $vendedor->save();
        // return redirect('/vendedor');
        return redirect('/vendedor')->with('msg', 'Vendedor criado!');
    }

    public function destroy($id){

        Vendedor::findOrFail($id)->delete();

        return redirect('/vendedor')->with('msg', 'Vendedor deletado!');
    }
}
