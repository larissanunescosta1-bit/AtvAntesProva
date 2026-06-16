<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categoria';

    protected $fillable = [
        'nome'
    ];

    //  1:N  pq uma categoria tem muitas tarefas
    public function tarefas()
    {
        return $this->hasMany(Tarefa::class, 'categoria_id');
    }
}