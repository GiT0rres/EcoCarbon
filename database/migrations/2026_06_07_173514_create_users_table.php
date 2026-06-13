<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Cria a tabela de usuários do sistema.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Identificador único do usuário

            $table->string('name'); // Nome do usuário
            $table->string('email')->unique(); // E-mail único para acesso ao sistema
            $table->string('password'); // Senha criptografada

            // Informações da empresa cadastrada
            $table->string('empresa')->nullable(); // Nome da empresa
            $table->string('cnpj')->nullable(); // CNPJ da empresa
            $table->string('setor')->nullable(); // Área de atuação
            $table->integer('funcionarios')->nullable(); // Quantidade de funcionários

            // Dados de localização
            $table->string('cidade')->nullable(); // Cidade da empresa
            $table->string('estado')->nullable(); // Estado da empresa

            $table->rememberToken(); // Token utilizado para manter o usuário logado
            $table->timestamps(); // Datas de criação e atualização do registro
        });
    }

    /**
     * Remove a tabela caso a migration seja revertida.
     */
    public function down(): void
    {
        // Exclui a tabela de usuários
        Schema::dropIfExists('users');
    }
};
