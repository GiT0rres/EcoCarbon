<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fontes_emissao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('calculo_id')->constrained('calculos')->onDelete('cascade');

            // ── ENERGIA ──────────────────────────────────────────────
            $table->float('energia_consumo_kwh')->default(0);
            // rede_eletrica | solar | biomassa | gas_natural
            $table->string('energia_fonte')->default('rede_eletrica');
            $table->float('energia_emissao_tco2e')->default(0);

            // ── TRANSPORTE ────────────────────────────────────────────
            $table->float('transporte_km')->default(0);
            // diesel | gasolina | etanol | gnv | eletrico
            $table->string('transporte_combustivel')->default('diesel');
            $table->float('transporte_emissao_tco2e')->default(0);

            // ── RESÍDUOS ──────────────────────────────────────────────
            $table->float('residuos_kg')->default(0);
            // aterro | reciclagem | compostagem | incineracao
            $table->string('residuos_destino')->default('aterro');
            $table->float('residuos_emissao_tco2e')->default(0);

            // ── VIAGENS DE NEGÓCIOS ───────────────────────────────────
            $table->float('viagens_km')->default(0);
            // aereo | rodoviario | ferroviario
            $table->string('viagens_meio')->default('aereo');
            $table->float('viagens_emissao_tco2e')->default(0);

            // ── COMPRAS ───────────────────────────────────────────────
            $table->float('compras_valor_reais')->default(0);
            // escritorio | ti | servicos | alimentacao
            $table->string('compras_categoria')->default('escritorio');
            $table->float('compras_emissao_tco2e')->default(0);

            // ── TOTAL ─────────────────────────────────────────────────
            $table->float('total_emissao_tco2e')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fontes_emissao');
    }
};