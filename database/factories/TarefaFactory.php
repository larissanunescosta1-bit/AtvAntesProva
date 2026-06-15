<?php

namespace Database\Factories;

use App\Models\Tarefa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tarefa>
 */
class TarefaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'categoria_id' =>  Categoria::factory(),
        'titulo' => fake()->sentence(3),
        'descricao' => fake()->text(),
        'realizada' => false
        ];
    }
}
