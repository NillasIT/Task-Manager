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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Inserir categorias predefinidas
        DB::table('categories')->insert([
            ['name' => 'Trabalho'],
            ['name' => 'Pessoal'],
            ['name' => 'Estudos'],
            ['name' => 'Projetos'],
            ['name' => 'Tecnologia'],
            ['name' => 'Video Games'],
            ['name' => 'Programação'],

            ['name' => 'Música'],
            ['name' => 'Filmes'],
            ['name' => 'Series'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
