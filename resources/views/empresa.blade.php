@extends('layouts.cabecalho')

@section('title', 'Empresa')

@section('content')
    @if(session('msg')) 
        <p class="msg">{{session('msg')}}</p>
    @endif
    <div id="cria-empresa">
        <h2>Adicionar nova Empresa</h2>
        <form action="/empresa" method="POST">
            <div class="form-group">
                @csrf
                <label for="title">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                {{-- <input type="number" min="0" class="form-control" id="comissao" name="comissao" placeholder="Comissao"> --}}
                <label for="title">Taxa de comissão:</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" aria-label="Quantia" name="comissao" id="comissao" placeholder="00">
                    <div class="input-group-append">
                      <span class="input-group-text">%</span>
                    </div>
                  </div>
                <input type="submit" class="btn btm-primary" value="Adicionar Empresa">
            </div>
        </form>
        <br>
        <form id="busca-empresa" class="col-md-12" action="">
            <input type="text" id="busca" name="busca" class="form-control" placeholder="Buscar empresa">
        </form>
    </div>
    <table class="container-lg">
        @foreach ($empresas as $empresa)
        <tr>
            <td class=".col-md-3">
                {{$empresa->nome}}
            </td>
            <td class="col-md-3">
                {{$empresa->comissao}}%
            </td>
            <td class=".col-md-3">
                <form action="/empresa/{{ $empresa->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  

@endsection