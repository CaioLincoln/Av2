<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\Funcionario;
use App\Models\Vendedor;
use App\Models\Receita;
use App\Models\Bem;
use Carbon\Carbon;


class ContratoController extends Controller
{
    public function index(){

        $contrato = Contrato::all();
        $funcionarios = Funcionario::all();
        $vendedores = Vendedor::all();
        $bem = Bem::all();
        return view('contrato',[
            'contratos' => $contrato,
            'funcionarios' => $funcionarios,
            'vendedores' => $vendedores,
            'bem' => $bem
        ]);
    }

    public function store(Request $request){
        
    
        if(Funcionario::findOrFail($request->funcionario)->SPC == 1){
            return redirect('/contrato')->with('alert', 'Funcionário com nome sujo, falha no financeamento!');
        }
        $data_parcela = Carbon::createFromFormat('Y-m-d',$request->inicio);
        $valor_parcela = $request->valor / $request->num_parcela;
        if($valor_parcela>Funcionario::findOrFail($request->funcionario)->salario){
            return redirect('/contrato')->with('alert', 'O valor da parcela excede o salário do funcionário, falha no financeamento!');
        }

        $contrato = new Contrato;
        
        $contrato ->nome = $request->nome;
        $contrato ->inicio = $request->inicio;
        $contrato ->valor = $request->valor;
        $contrato ->funcionario_id = $request->funcionario;
        $contrato ->vendedor_id = $request->vendedor;
        $contrato->save();
        
        $bem = new Bem;
        $bem ->nome = $request->nome_bem;
        $bem ->valor = $request->valor_bem;
        $contrato->bem()->save($bem);
        
        for($i = 0; $i < $request->num_parcela ; $i++){
            $receita = new Receita;
            $receita -> valor = $valor_parcela;
            $receita -> pago = 0;
            $receita -> vencimento = $data_parcela;
            $data_parcela->addMonth();
            $contrato->receita()->save($receita);
        }


        return redirect('/contrato')->with('msg', 'Contrato criado!');
    }

    public function destroy($id){

        Contrato::findOrFail($id)->delete();

        return redirect('/contrato')->with('msg', 'Contrato deletado!');
    }
}
