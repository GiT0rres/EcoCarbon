<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FonteEmissao extends Model
{
    protected $table = 'fontes_emissao';

    protected $fillable = [
        'calculo_id',

        'energia_consumo_kwh',
        'energia_fonte',
        'energia_emissao_tco2e',

        'transporte_km',
        'transporte_combustivel',
        'transporte_emissao_tco2e',

        'residuos_kg',
        'residuos_destino',
        'residuos_emissao_tco2e',

        'viagens_km',
        'viagens_meio',
        'viagens_emissao_tco2e',

        'compras_valor_reais',
        'compras_categoria',
        'compras_emissao_tco2e',

        'total_emissao_tco2e',
    ];

    protected $casts = [
        'energia_consumo_kwh'      => 'float',
        'energia_emissao_tco2e'    => 'float',
        'transporte_km'            => 'float',
        'transporte_emissao_tco2e' => 'float',
        'residuos_kg'              => 'float',
        'residuos_emissao_tco2e'   => 'float',
        'viagens_km'               => 'float',
        'viagens_emissao_tco2e'    => 'float',
        'compras_valor_reais'      => 'float',
        'compras_emissao_tco2e'    => 'float',
        'total_emissao_tco2e'      => 'float',
    ];

    // ── Relacionamento ─────────────────────────────────────────────

    public function calculo()
    {
        return $this->belongsTo(Calculo::class);
    }

    // ── Fatores de Emissão ─────────────────────────────────────────
    // Baseados no GHG Protocol / IPCC / ABNT NBR ISO 14064
    // Todos em tCO₂e por unidade de consumo

    /**
     * Fatores para energia elétrica (tCO₂e / kWh)
     * Fator médio da rede elétrica brasileira: 0,0001688 tCO₂e/kWh (MCTIC 2024)
     */
    public static function fatorEnergia(string $fonte): float
    {
        return match ($fonte) {
            'rede_eletrica' => 0.0001688, // Grid brasileiro (MCTIC 2024)
            'solar'         => 0.0000480, // Ciclo de vida
            'biomassa'      => 0.0000000, // Considerada neutra no escopo 1
            'gas_natural'   => 0.0002020, // Combustão gás natural
            default         => 0.0001688,
        };
    }

    /**
     * Fatores para transporte (tCO₂e / km)
     * Fonte: GHG Protocol Brasil / IPCC 2006
     */
    public static function fatorTransporte(string $combustivel): float
    {
        return match ($combustivel) {
            'diesel'    => 0.000216, // Caminhão médio diesel
            'gasolina'  => 0.000192, // Carro gasolina
            'etanol'    => 0.000066, // Carro flex / etanol
            'gnv'       => 0.000137, // GNV veicular
            'eletrico'  => 0.000025, // Elétrico (rede BR)
            default     => 0.000216,
        };
    }

    /**
     * Fatores para resíduos (tCO₂e / kg)
     * Fonte: IPCC 2006 / ABNT NBR 15112
     */
    public static function fatorResiduo(string $destino): float
    {
        return match ($destino) {
            'aterro'       => 0.000632, // Aterro sanitário com CH₄
            'reciclagem'   => 0.000060, // Coleta + processamento
            'compostagem'  => 0.000130, // Emissões N₂O + CH₄
            'incineracao'  => 0.000950, // Combustão sem recuperação
            default        => 0.000632,
        };
    }

    /**
     * Fatores para viagens aéreas (tCO₂e / km por passageiro)
     * Fonte: ICAO / GHG Protocol
     */
    public static function fatorViagem(string $meio): float
    {
        return match ($meio) {
            'aereo'       => 0.000163, // Classe econômica média
            'rodoviario'  => 0.000089, // Ônibus interestadual
            'ferroviario' => 0.000041, // Trem / metrô
            default       => 0.000163,
        };
    }
    public function storeFontes(Request $request)
{
    $calculo = Calculo::where('user_id', auth()->id())
        ->latest()
        ->first();

    if (!$calculo) {
        return redirect()->route('calculo.novo');
    }

    $emissoes = FonteEmissao::calcularEmissoes($request->all());

    $calculo->fonteEmissao()->create($emissoes);

    return redirect()->route('calculo.revisao');
}
    /**
     * Fatores para compras (tCO₂e / R$ 1.000)
     * Fonte: Análise input-output (IBGE + GHG Protocol EEIO)
     */
    public static function fatorCompra(string $categoria): float
    {
        return match ($categoria) {
            'escritorio'  => 0.000000, // Materiais de escritório — emissão mínima
            'ti'          => 0.000085, // Equipamentos TI — ciclo fabricação
            'servicos'    => 0.000042, // Serviços terceirizados
            'alimentacao' => 0.000210, // Alimentação — cadeia agropecuária
            default       => 0.000000,
        };
    }

    // ── Métodos de cálculo ─────────────────────────────────────────

    public static function calcularEmissoes(array $dados): array
    {
        $energia   = round((float)($dados['energia_consumo_kwh']  ?? 0) * self::fatorEnergia($dados['energia_fonte']             ?? 'rede_eletrica'), 2);
        $transp    = round((float)($dados['transporte_km']        ?? 0) * self::fatorTransporte($dados['transporte_combustivel'] ?? 'diesel'),        2);
        $residuos  = round((float)($dados['residuos_kg']          ?? 0) * self::fatorResiduo($dados['residuos_destino']         ?? 'aterro'),         2);
        $viagens   = round((float)($dados['viagens_km']           ?? 0) * self::fatorViagem($dados['viagens_meio']              ?? 'aereo'),          2);
        $compras   = round((float)($dados['compras_valor_reais']  ?? 0) / 1000 * self::fatorCompra($dados['compras_categoria']  ?? 'escritorio'),     2);

        return [
            'energia_emissao_tco2e'    => $energia,
            'transporte_emissao_tco2e' => $transp,
            'residuos_emissao_tco2e'   => $residuos,
            'viagens_emissao_tco2e'    => $viagens,
            'compras_emissao_tco2e'    => $compras,
            'total_emissao_tco2e'      => round($energia + $transp + $residuos + $viagens + $compras, 2),
        ];
    }
}