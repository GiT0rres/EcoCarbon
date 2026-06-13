<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a criação das tabelas relacionadas ao cache.
     */
    public function up(): void
    {
        // Tabela responsável por armazenar dados em cache
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary(); // Chave única do cache
            $table->mediumText('value'); // Valor armazenado no cache
            $table->bigInteger('expiration')->index(); // Data de expiração do cache
        });

        // Tabela utilizada para controlar bloqueios (locks) do cache
        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary(); // Chave do bloqueio
            $table->string('owner'); // Proprietário do lock
            $table->bigInteger('expiration')->index(); // Data de expiração do bloqueio
        });
    }

    /**
     * Remove as tabelas criadas ao desfazer a migration.
     */
    public function down(): void
    {
        // Exclui as tabelas relacionadas ao cache
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};
