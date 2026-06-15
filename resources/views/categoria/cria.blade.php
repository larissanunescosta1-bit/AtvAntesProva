@extends('leiaut.base')

@section('titulo')
    Criar nova categoria<br>
    <a class="btn btn-dark" href="{{ route('categoria.index') }}">Voltar</a>
@endsection

@section('conteudo')

<form action="{{ route('categoria.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" name="nome" required>
    </div>

    <button class="btn btn-primary">Criar categoria</button>
</form>

@endsection