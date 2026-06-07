<?php

namespace App\Http\Controllers;

use App\Models\Calculo;
use App\Models\FonteEmissao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalculoController extends Controller
{
    public function create()
    {
        return view('dashboard.novo-calculo');
    }

    public function fontesEmissao()
    {
        return view('dashboard.fontes-emissao');
    }

    public function revisao()
    {
        $calculo = Calculo::where('user_id', auth()->id())
            ->latest()
            ->first();

        if (!$calculo) {
            return redirect()->route('calculo.novo');
        }

        $calculo->load('fonteEmissao');

        return view('dashboard.Revisao', compact('calculo'));
    }

    public function resultados()
    {
        $calculo = Calculo::with('fonteEmissao')
            ->where('user_id', auth()->id())
            ->latest()
            ->first();

        $fonte = $calculo?->fonteEmissao ?? (object)[
            'energia_emissao_tco2e'    => 0,
            'transporte_emissao_tco2e' => 0,
            'residuos_emissao_tco2e'   => 0,
            'viagens_emissao_tco2e'    => 0,
            'compras_emissao_tco2e'    => 0,
            'total_emissao_tco2e'      => 0,
        ];

        $historico = Calculo::select(
                'calculos.ano_referencia as ano',
                DB::raw('SUM(fontes_emissao.total_emissao_tco2e) as total')
            )
            ->join('fontes_emissao', 'fontes_emissao.calculo_id', '=', 'calculos.id')
            ->where('calculos.user_id', auth()->id())
            ->groupBy('calculos.ano_referencia')
            ->orderBy('calculos.ano_referencia')
            ->get();

        $total   = $fonte->total_emissao_tco2e ?? 0;
        $arvores = round($total * 166.67);
        $kmCarro = round($total * 6000);
        // Após calcular $total, $arvores, $kmCarro:

        // Nível: referência GHG Protocol Brasil (tCO₂e/ano por empresa)
        $nivel = match(true) {
            $total <= 50   => 'Baixo',
            $total <= 200  => 'Moderado',
            default        => 'Alto',
        };

        // Agulha: Baixo = -90deg (esquerda), Moderado = 0deg (centro), Alto = +90deg (direita)
        $agulhaRot = match($nivel) {
            'Baixo'    => '-80deg',
            'Moderado' => '0deg',
            'Alto'     => '80deg',
        };
        $variacao = null;
        if ($historico->count() >= 2) {
            $anterior = $historico->get($historico->count() - 2)?->total ?? 0;
            $atual    = $historico->last()->total ?? 0;
            $variacao = $anterior > 0 ? (($atual - $anterior) / $anterior) * 100 : null;
        }

        return view('dashboard.resultados', [
    'calculo'    => $calculo,
    'fonte'      => $fonte,
    'historico'  => $historico,
    'variacao'   => $variacao,
    'arvores'    => $arvores,
    'kmCarro'    => $kmCarro,
    'nivel'      => $nivel,
    'agulhaRot'  => $agulhaRot,
]);
    }

    public function historicoEmissoes()
{
    $dados = Calculo::select(
            'calculos.ano_referencia',
            DB::raw('SUM(
                fontes_emissao.energia_emissao_tco2e +
                fontes_emissao.transporte_emissao_tco2e +
                fontes_emissao.residuos_emissao_tco2e +
                fontes_emissao.viagens_emissao_tco2e +
                fontes_emissao.compras_emissao_tco2e
            ) as total')
        )
        ->join('fontes_emissao', 'fontes_emissao.calculo_id', '=', 'calculos.id')
        ->where('calculos.user_id', auth()->id())
        ->groupBy('calculos.ano_referencia')
        ->orderBy('calculos.ano_referencia')
        ->get();

    $anos   = $dados->pluck('ano_referencia');
    $totais = $dados->pluck('total');

    $fontes = Calculo::select(
            'calculos.ano_referencia',
            DB::raw('SUM(fontes_emissao.energia_emissao_tco2e) as energia'),
            DB::raw('SUM(fontes_emissao.transporte_emissao_tco2e) as transporte'),
            DB::raw('SUM(fontes_emissao.residuos_emissao_tco2e) as residuos'),
            DB::raw('SUM(fontes_emissao.viagens_emissao_tco2e) as viagens'),
            DB::raw('SUM(fontes_emissao.compras_emissao_tco2e) as compras')
        )
        ->join('fontes_emissao', 'fontes_emissao.calculo_id', '=', 'calculos.id')
        ->where('calculos.user_id', auth()->id())
        ->groupBy('calculos.ano_referencia')
        ->orderBy('calculos.ano_referencia')
        ->get();

    $energias    = $fontes->pluck('energia');
    $transportes = $fontes->pluck('transporte');
    $residuos    = $fontes->pluck('residuos');
    $viagens     = $fontes->pluck('viagens');
    $compras     = $fontes->pluck('compras');

    $primeiro = $totais->first();
    $ultimo   = $totais->last();

    $reducaoTotal = $primeiro
        ? (($ultimo - $primeiro) / $primeiro) * 100
        : null;

    $media = $totais->avg();

    // ── Variáveis que a view precisa ──────────────────────────────
    $maiorEmissao  = $dados->sortByDesc('total')->first();   // objeto com ano_referencia e total
    $menorEmissao  = $dados->sortBy('total')->first();       // idem
    $melhorAno     = $menorEmissao?->ano_referencia ?? null;
    $piorAno       = $maiorEmissao?->ano_referencia ?? null;

    return view('dashboard.historico-emissoes', compact(
        'anos',
        'totais',
        'energias',
        'transportes',
        'residuos',
        'viagens',
        'compras',
        'reducaoTotal',
        'media',
        'maiorEmissao',   // ← adicionado
        'menorEmissao',   // ← adicionado
        'melhorAno',      // ← adicionado (caso a view use)
        'piorAno',        // ← adicionado (caso a view use)
    ));
}

    public function store(Request $request)
    {
        $calculo = Calculo::create([
            'user_id'           => auth()->id(),
            'empresa'           => $request->empresa,
            'cnpj'              => $request->cnpj,
            'setor'             => $request->setor,
            'funcionarios'      => $request->funcionarios,
            'cidade'            => $request->cidade,
            'estado'            => $request->estado,
            'ano_referencia'    => $request->ano_referencia,
            'responsavel'       => $request->responsavel,
            'email_responsavel' => $request->email_responsavel,
        ]);

        session(['calculo_id' => $calculo->id]);

        return redirect()->route('calculo.fontes');
    }

    public function storeFontes(Request $request)
    {
        $calculo = Calculo::find(session('calculo_id'));

        if (!$calculo) {
            return redirect()->route('calculo.novo');
        }

        $emissoes = FonteEmissao::calcularEmissoes($request->all());

        $calculo->fonteEmissao()->updateOrCreate(
            ['calculo_id' => $calculo->id],
            array_merge($emissoes, $request->only([
                'energia_consumo_kwh',
                'energia_fonte',
                'transporte_km',
                'transporte_combustivel',
                'residuos_kg',
                'residuos_destino',
                'viagens_km',
                'viagens_meio',
                'compras_valor_reais',
                'compras_categoria',
            ]))
        );

        return redirect()->route('calculo.revisao');
    }

    public function relatorios()
    {
        return view('dashboard.relatorios');
    }

    public function metodologia()
    {
        return view('dashboard.metodologia');
    }
}   