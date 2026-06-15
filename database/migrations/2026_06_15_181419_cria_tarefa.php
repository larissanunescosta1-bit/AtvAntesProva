<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
          Schema::create('tarefa', function (Blueprint $table) {
            $table->id();
            // Chave estrangeira
            $table->foreignId('categoria_id')->constrained('categoria')->onDelete('cascade');
            $table->string('titulo', 40);
            $table->text('descricao');
            $table->boolean('realizada')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
