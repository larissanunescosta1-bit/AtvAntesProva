<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categoria.lista', ['categorias' => $categorias, 'filtro' => '']);
    }

    public function create(){
        return view('categoria.cria');
    }

    public function store(Request $request) {
        try {
            $categoria = new Categoria();
            $categoria->nome = $request->input('nome');
            $categoria->save();

            session()->flash('msg', 'Armazenado com sucesso!');
            return redirect()->route('categoria.index');

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao armazenar: ' . $e->getMessage());
            return redirect()->route('categoria.create');
        }
        
    }

    public function view($id) {
        try {
            $categoria = Categoria::find($id);
            return view('categoria.visualizar', ['categoria' => $categoria]);

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao carregar: ' . $e->getMessage());
            return redirect()->route('categoria.index');
        }
    }

    public function update(Request $request, $id) {
        try {
            $categoria = Categoria::find($id);
            $categoria->nome = $request->input('nome');
            $categoria->save();

            session()->flash('msg', 'Atualizado com sucesso!');
            return redirect()->route('categoria.index');

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao atualizar: ' . $e->getMessage());
            return redirect()->route('categoria.edit', ['id' => $id]);
        }   
    }

    public function destroy($id) {
        try {
            $categoria = Categoria::find($id);
            $categoria->delete();

            session()->flash('msg', 'Registro excluído com sucesso!');
            return redirect()->route('categoria.index');

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao excluir: ' . $e->getMessage());
            return redirect()->route('categoria.index');
        }
    }

    public function search(Request $request)
    {
        $filtro = trim((string) $request->input('filtro', ''));

        $categorias = Categoria::where('nome', 'like', "%{$filtro}%")                  
                       ->orderBy('id')
                       ->get();

        return view('categoria.lista', ['categorias' => $categorias, 'filtro' => $filtro]);
    }
}
