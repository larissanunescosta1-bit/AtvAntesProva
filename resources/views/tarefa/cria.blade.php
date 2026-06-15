@extends('leiaute.base')

@section('conteudo')

<h2>Nova Tarefa</h2>

<form method="POST" action="{{ route('tarefa.store') }}">
    @csrf

    <div class="mb-3">
        <label>Título</label>
        <input type="text" name="titulo" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Categoria</label>
        <select name="categoria_id" class="form-control" required>
            @foreach($categorias as $cat)
                <option value="{{ $cat->id }}">{{ $cat->nome }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Salvar</button>
    <a href="{{ route('tarefa.index') }}" class="btn btn-secondary">Voltar</a>
</form>

@endsection