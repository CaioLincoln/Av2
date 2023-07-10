@extends('layouts.cabecalho')

@section('title', 'Vendedor')

@section('content')
    @if(session('msg')) 
        <p class="msg">{{session('msg')}}</p>
    @endif
    <div id="cria-vendedor">
        <h2>Adicionar novo vendedor</h2>
        <form action="/vendedor" method="POST">
            <div class="form-group">
                @csrf
                <label for="title">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                <input type="submit" class="btn btm-primary" value="Adicionar Vendedor">
            </div>
        </form>
        <br>
        <form id="busca-vendedor" class="col-md-12" action="">
            <input type="text" id="busca" name="busca" class="form-control" placeholder="Buscar vendedor">
        </form>
    </div>
    <table class="container-lg">
        @foreach ($vendedores as $vendedor)
        <tr>
            <td class=".col-md-3">
                &nbsp;
            </td>
            <td class="col-md-6">
                {{$vendedor->nome}}
            </td>
            <td class=".col-md-3">
                <form action="/vendedor/{{ $vendedor->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  

@endsection