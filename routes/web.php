<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\CategoriaController;

Route::get('/', [TarefaController::class, 'index'])
    ->name('raiz');

Route::get('/tarefa', [TarefaController::class, 'index'])->name('tarefa.index');
Route::get('/tarefa/create', [TarefaController::class, 'create'])->name('tarefa.create');
Route::post('/tarefa', [TarefaController::class, 'store'])->name('tarefa.store');
Route::get('/tarefa/{id}/view', [TarefaController::class, 'view'])->name('tarefa.view');
Route::post('/tarefa/{id}/update', [TarefaController::class, 'update'])->name('tarefa.update');
Route::get('/tarefa/{id}/destroy', [TarefaController::class, 'destroy'])->name('tarefa.destroy');
Route::get('/tarefa/done/{id}', [TarefaController::class, 'done'])->name('tarefa.done');