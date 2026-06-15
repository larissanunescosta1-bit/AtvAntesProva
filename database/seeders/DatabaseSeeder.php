<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Tarefa;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Criando categorias FIXAS (do enunciado)
        $padrao = Categoria::create(['nome' => 'padrão']);
        $compras = Categoria::create(['nome' => 'compras']);
        $compromissos = Categoria::create(['nome' => 'compromissos']);
        $remedio = Categoria::create(['nome' => 'remédio']);

        // Criando tarefas EXATAS do enunciado

        // padrão
        Tarefa::create([
            'categoria_id' => $padrao->id,
            'titulo' => 'entregar dever DW2',
            'descricao' => 'atividade da faculdade',
            'realizada' => false
        ]);

        Tarefa::create([
            'categoria_id' => $padrao->id,
            'titulo' => 'visitar os avós',
            'descricao' => 'final de semana',
            'realizada' => false
        ]);

        // compras
        Tarefa::create([
            'categoria_id' => $compras->id,
            'titulo' => 'buscar o PS5 PRO',
            'descricao' => 'loja do shopping',
            'realizada' => false
        ]);

        // remédio
        Tarefa::create([
            'categoria_id' => $remedio->id,
            'titulo' => 'aspirina às 16:00',
            'descricao' => 'tomar após almoço',
            'realizada' => false
        ]);
    }
}