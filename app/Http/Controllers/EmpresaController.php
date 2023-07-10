<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    public function index(){

        $empresas = Empresa::all();
        return view('empresa',['empresas' => $empresas]);
    }

    public function store(Request $request){
        
        $empresa = new Empresa;
        $empresa ->nome = $request->nome;
        $empresa ->comissao = $request->comissao;
        $empresa->save();
        return redirect('/empresa')->with('msg', 'Empresa criada!');
    }

    public function destroy($id){

        Empresa::findOrFail($id)->delete();

        return redirect('/empresa')->with('msg', 'Empresa deletada!');
    }
}
