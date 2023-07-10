@extends('layouts.cabecalho')

@section('title', 'funcionario')

@section('content')
    @if (session('msg'))
        <p class="msg">{{ session('msg') }}</p>
    @endif
    <div id="cria-funcionario">
        <h2>Adicionar nova funcionario</h2>
        <form action="/funcionario" method="POST">
            <div class="form-group">
                @csrf
                <label for="title">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                <label for="title">Nascimento:</label>
                <div class="input-group mb-3">
                    <input type="date" class="form-control" id="nascimento" name="nascimento">
                </div>
                <label for="title">Salário:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">R$</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Quantia" id="salario" name="salario" placeholder="1.000">
                    <div class="input-group-append">
                        <span class="input-group-text">,00</span>
                    </div>
                </div>
                <label for="title">Empresa:</label>
                <select name="empresa" id="empresa">
                    @foreach ($empresas as $empresa)
                        <option value="{{ $empresa->id }}">{{ $empresa->nome }}</option>
                    @endforeach
                </select><br>
                <input type="submit" class="btn btm-primary" value="Adicionar funcionario">
            </div>
        </form>
        <br>
        <form id="busca-funcionario" class="col-md-12" action="">
            <input type="text" id="busca" name="busca" class="form-control" placeholder="Buscar funcionario">
        </form>
    </div>
    <table class="container-lg">
        @foreach ($funcionarios as $funcionario)
            <tr>
                <td class=".col-md-2">
                    {{ $funcionario->nome }}
                </td>
                <td class="col-md-2">
                    {{ $funcionario->nascimento}}
                </td>
                <td class="col-md-2">
                    {{ $funcionario->empresa->nome}}
                </td>
                <td class="col-md-2">
                    R${{ $funcionario->salario}}
                </td>
                <td class="col-md-2">
                    {{ $funcionario->SPC}}
                </td>
                <td class=".col-md-2">
                    <form action="/funcionario/{{ $funcionario->id }}" method="POST">
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
