@extends('layouts.cabecalho')

@section('title', 'contrato')

@section('content')
    @if (session('msg'))
        <p class="msg">{{ session('msg') }}</p>
    @endif
    @if (session('alert'))
        <script>
            alert("{{ session('alert') }}");
        </script>
    @endif
    <div id="cria-contrato">
        <h2>Adicionar nova contrato</h2>
        <form action="/contrato" method="POST">
            <div class="form-group">
                @csrf
                <label for="title">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                <label for="title">Valor:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">R$</span>
                    </div>
                    <input type="text" class="form-control" id="valor" name="valor" placeholder="1.000">
                    <div class="input-group-append">
                        <span class="input-group-text">,00</span>
                    </div>
                </div>
                <label for="title">Inicio:</label>
                <div class="input-group mb-3">
                    <input type="date" class="form-control" id="inicio" name="inicio">
                </div>
                <label for="title">Nome Bem:</label>
                <input type="text" class="form-control" id="nome_bem" name="nome_bem" placeholder="Carro">
                <label for="title">Valor Bem:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">R$</span>
                    </div>
                    <input type="text" class="form-control" id="valor_bem" name="valor_bem" placeholder="1.000">
                    <div class="input-group-append">
                        <span class="input-group-text">,00</span>
                    </div>
                </div>
                <div class="form-outline" style="width: 22rem;">
                    <label for="title">Número de parcelas:</label>
                    <input max="24" min="1" value="10" type="number" name="num_parcela" id="num_parcela" >
                </div>
                <label for="title">Vendedor:</label>
                <select name="vendedor" id="vendedor">
                    @foreach ($vendedores as $vendedor)
                        <option value="{{ $vendedor->id }}">{{ $vendedor->nome }}</option>
                    @endforeach
                </select>
                <label for="title">Funcionário:</label>
                <select name="funcionario" id="funcionario">
                    @foreach ($funcionarios as $funcionario)
                        <option value="{{ $funcionario->id }}">{{ $funcionario->nome }}</option>
                    @endforeach
                </select>
                <br>
                <input type="submit" class="btn btm-primary" value="Adicionar contrato">
            </div>
        </form>
        <br>
        <form id="busca-contrato" class="col-md-12" action="">
            <input type="text" id="busca" name="busca" class="form-control" placeholder="Buscar contrato">
        </form>
    </div>
    <table class="container-lg">
        @foreach ($contratos as $contrato)
            <tr>
                <td class=".col-md-2">
                    {{ $contrato->nome}}
                </td>
                <td class="col-md-2">
                    R${{ $contrato->valor}}
                </td>
                <td class="col-md-2">
                    {{ $contrato->inicio}}
                </td>
                <td class="col-md-2">
                    {{-- {{ $contrato->funcionario->nome}} --}}
                </td>
                <td class="col-md-2">
                    {{-- {{ $contrato->vendedor->nome}} --}}
                </td>
                <td class=".col-md-2">
                    <form action="/contrato/{{ $contrato->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline">Deletar
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
