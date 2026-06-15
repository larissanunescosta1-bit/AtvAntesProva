@extends('leiaute.base')

@section('conteudo')

<h2>Editar Tarefa</h2>

<form method="POST" action="{{ route('tarefa.update', $tarefa->id) }}">
    @csrf

    <div class="mb-3">
        <label>Título</label>
        <input type="text" name="titulo" class="form-control" value="{{ $tarefa->titulo }}" required>
    </div>

    <div class="mb-3">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control">{{ $tarefa->descricao }}</textarea>
    </div>

    <div class="mb-3">
        <label>Categoria</label>
        <select name="categoria_id" class="form-control">
            @foreach($categorias as $cat)
                <option value="{{ $cat->id }}"
                    {{ $tarefa->categoria_id == $cat->id ? 'selected' : '' }}>
                    {{ $cat->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary">Atualizar</button>
    <a href="{{ route('tarefa.index') }}" class="btn btn-secondary">Voltar</a>
</form>

@endsection