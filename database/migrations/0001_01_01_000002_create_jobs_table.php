<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a criação das tabelas no banco de dados.
     */
    public function up(): void
    {
        // Tabela responsável por armazenar os jobs que serão processados em fila
        Schema::create('jobs', function (Blueprint $table) {
            $table->id(); // Identificador único do job
            $table->string('queue')->index(); // Nome da fila
            $table->longText('payload'); // Dados da tarefa em formato serializado
            $table->unsignedSmallInteger('attempts'); // Quantidade de tentativas de execução
            $table->unsignedInteger('reserved_at')->nullable(); // Momento em que o job foi reservado
            $table->unsignedInteger('available_at'); // Momento em que o job estará disponível
            $table->unsignedInteger('created_at'); // Data de criação do job
        });

        // Tabela utilizada para armazenar lotes de jobs
        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary(); // ID único do lote
            $table->string('name'); // Nome do lote
            $table->integer('total_jobs'); // Quantidade total de jobs
            $table->integer('pending_jobs'); // Jobs pendentes
            $table->integer('failed_jobs'); // Jobs que falharam
            $table->longText('failed_job_ids'); // IDs dos jobs com falha
            $table->mediumText('options')->nullable(); // Opções adicionais do lote
            $table->integer('cancelled_at')->nullable(); // Data de cancelamento
            $table->integer('created_at'); // Data de criação
            $table->integer('finished_at')->nullable(); // Data de finalização
        });

        // Tabela que registra jobs que apresentaram erro durante a execução
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id(); // Identificador único
            $table->string('uuid')->unique(); // UUID do job
            $table->string('connection'); // Conexão utilizada
            $table->string('queue'); // Fila em que estava o job
            $table->longText('payload'); // Dados do job
            $table->longText('exception'); // Mensagem de erro gerada
            $table->timestamp('failed_at')->useCurrent(); // Data da falha

            // Índice para melhorar a busca por jobs com falha
            $table->index(['connection', 'queue', 'failed_at']);
        });
    }

    /**
     * Remove as tabelas criadas caso seja necessário desfazer a migration.
     */
    public function down(): void
    {
        // Remove as tabelas do banco de dados
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('failed_jobs');
    }
};
