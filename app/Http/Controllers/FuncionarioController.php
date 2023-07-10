<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Empresa;

class FuncionarioController extends Controller
{
    public function index(){

        $funcionario = Funcionario::all();
        $empresa = Empresa::all();
        return view('funcionario',['funcionarios' => $funcionario,'empresas' => $empresa]);
    }

    public function store(Request $request){
        
        $funcionario = new Funcionario;
        $funcionario ->nome = $request->nome;
        $funcionario ->nascimento = $request->nascimento;
        $funcionario ->empresa_id = $request->empresa;
        $funcionario ->salario = $request->salario;
        $funcionario ->SPC = false;
        $funcionario->save();
        return redirect('/funcionario')->with('msg', 'Funcionário criado!');
    }
    public function destroy($id){

        Funcionario::findOrFail($id)->delete();

        return redirect('/funcionario')->with('msg', 'Funcionário deletado!');
    }
}
