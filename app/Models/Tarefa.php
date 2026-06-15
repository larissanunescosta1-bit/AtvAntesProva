<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarefa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tarefa';

    protected $fillable = [
        'categoria_id',
        'titulo',
        'descricao',
        'realizada'
    ];

    //  N:1  pq muitas tarefas pertencem a uma categori
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}