<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('calculos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Dados da empresa (preenchidos na etapa 1)
            $table->string('empresa');
            $table->string('cnpj');
            $table->string('setor');
            $table->integer('funcionarios');
            $table->string('cidade');
            $table->string('estado');
            $table->year('ano_referencia');
            $table->string('responsavel');
            $table->string('email_responsavel');

            // Status do cálculo
            // rascunho | fontes | revisao | concluido
            $table->string('status')->default('rascunho');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calculos');
    }
};