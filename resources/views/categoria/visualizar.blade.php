@extends('leiaut.base')

@section('titulo')
    Visualizar categoria<br>
    <a class="btn btn-dark" href="{{ route('categoria.index') }}">Voltar</a>
@endsection

@section('conteudo')

<p><strong>Nome</strong> {{ $categoria->nome }}</p>


@endsection