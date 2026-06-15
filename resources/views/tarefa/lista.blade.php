@extends('leiaute.base')

@section('conteudo')

<div class="d-flex justify-content-between mb-3">
    <h2>Lista de Tarefas</h2>
    <a href="{{ route('tarefa.create') }}" class="btn btn-primary">+ Nova Tarefa</a>
</div>

<form method="GET" action="{{ route('tarefa.index') }}" class="mb-3">
    <input type="text" name="filtro" class="form-control" placeholder="Buscar tarefa..." value="{{ $filtro }}">
</form>

<table class="table table-bordered bg-white">
    <thead class="table-dark">
        <tr>
            <th>✔</th>
            <th>Título</th>
            <th>Categoria</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach($tarefas as $tarefa)
        <tr>
            <td>
                <a href="{{ route('tarefa.done', $tarefa->id) }}">
                    @if($tarefa->realizada)
                        ✅
                    @else
                        ⬜
                    @endif
                </a>
            </td>

            <td class="{{ $tarefa->realizada ? 'text-decoration-line-through' : '' }}">
                {{ $tarefa->titulo }}
            </td>

            <td>{{ $tarefa->categoria->nome ?? '-' }}</td>

            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                        Ações
                    </button>

                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('tarefa.view', $tarefa->id) }}">
                                ✏ Editar
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item text-danger" href="{{ route('tarefa.destroy', $tarefa->id) }}">
                                🗑 Excluir
                            </a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection