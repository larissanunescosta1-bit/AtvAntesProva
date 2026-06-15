<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;
use App\Models\Categoria;

class TarefaController extends Controller
{

    public function index(Request $request)
    {
        $filtro = $request->input('filtro');

        $tarefas = Tarefa::with('categoria')
            ->when($filtro, function ($query) use ($filtro) {
                $query->where('titulo', 'like', "%$filtro%");
            })
            ->get();

        return view('tarefa.lista', [
            'tarefas' => $tarefas,
            'filtro' => $filtro
        ]);
    }

    // 🔹 FORM CRIAR
    public function create()
    {
        $categorias = Categoria::all();

        return view('tarefa.cria', [
            'categorias' => $categorias
        ]);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:40',
            'categoria_id' => 'required|exists:categoria,id'
        ]);

        Tarefa::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'categoria_id' => $request->categoria_id,
            'realizada' => false
        ]);

        return redirect()->route('tarefa.index')
            ->with('success', 'Tarefa criada com sucesso!');
    }


    public function view($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $categorias = Categoria::all();

        return view('tarefa.visualizar', [
            'tarefa' => $tarefa,
            'categorias' => $categorias
        ]);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|max:40',
            'categoria_id' => 'required|exists:categoria,id'
        ]);

        $tarefa = Tarefa::findOrFail($id);

        $tarefa->update([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'categoria_id' => $request->categoria_id
        ]);

        return redirect()->route('tarefa.index')
            ->with('success', 'Tarefa atualizada!');
    }

    public function destroy($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->delete();

        return redirect()->route('tarefa.index')
            ->with('success', 'Tarefa excluída!');
    }

    
    public function done($id)
    {
        $tarefa = Tarefa::findOrFail($id);
 $tarefa->realizada = !$tarefa->realizada; $tarefa->save();

        return redirect()->back()->with('success', 'Status da tarefa atualizado!');
    }
}