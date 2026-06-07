@php
$fonte = $fonte ?? null;

$energia = $fonte?->energia_emissao_tco2e ?? 0;
$transp  = $fonte?->transporte_emissao_tco2e ?? 0;
$resid   = $fonte?->residuos_emissao_tco2e ?? 0;
$viag    = $fonte?->viagens_emissao_tco2e ?? 0;
$comp    = $fonte?->compras_emissao_tco2e ?? 0;

$total = $fonte?->total_emissao_tco2e ?? ($energia + $transp + $resid + $viag + $comp);

$totalFmt = number_format($total, 2, ',', '.');

$nivel = $nivel ?? 'Baixo';

$nivelColor = match($nivel) {
    'Baixo'    => '#2e7d32',
    'Moderado' => '#d97706',
    'Alto'     => '#dc2626',
    default    => '#2e7d32',
};

$arvores  = $arvores  ?? 0;
$kmCarro  = $kmCarro  ?? 0;
$variacao = $variacao ?? null;

$pct = fn($v) => $total > 0 ? round(($v / $total) * 100) : 0;
@endphp

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados - EcoCarbon</title>
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-regular-chubby/css/uicons-regular-chubby.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-solid-straight/css/uicons-solid-straight.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-regular-straight/css/uicons-regular-straight.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-thin-rounded/css/uicons-thin-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-thin-straight/css/uicons-thin-straight.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>

    <style>
        .results-top-row { display:grid; grid-template-columns:1fr 260px 290px; gap:16px; margin-bottom:16px; align-items:stretch; }
        .result-hero { background:linear-gradient(135deg,#1b5e20 0%,#2e7d32 60%,#388e3c 100%); border-radius:14px; padding:28px 32px; color:white; display:flex; flex-direction:column; justify-content:space-between; position:relative; overflow:hidden; }
        .result-hero::before { content:''; position:absolute; top:-50px; right:-50px; width:200px; height:200px; background:rgba(255,255,255,.06); border-radius:50%; pointer-events:none; }
        .result-hero::after  { content:''; position:absolute; bottom:-70px; right:60px; width:160px; height:160px; background:rgba(255,255,255,.04); border-radius:50%; pointer-events:none; }
        .hero-label  { font-size:12.5px; font-weight:600; opacity:.8; display:flex; align-items:center; gap:6px; margin-bottom:4px; }
        .hero-value  { font-size:62px; font-weight:800; line-height:1; letter-spacing:-2px; }
        .hero-unit   { font-size:17px; font-weight:500; opacity:.85; margin-top:4px; }
        .hero-equiv  { display:flex; gap:28px; margin-top:22px; padding-top:18px; border-top:1px solid rgba(255,255,255,.2); }
        .equiv-item  { display:flex; align-items:center; gap:10px; }
        .equiv-icon  { width:38px; height:38px; background:rgba(255,255,255,.12); border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:18px; }
        .equiv-text strong { display:block; font-size:16px; font-weight:700; }
        .equiv-text span   { font-size:11.5px; opacity:.75; line-height:1.3; }
        .gauge-card  { background:white; border-radius:14px; border:1px solid #e5e7eb; padding:24px 20px; box-shadow:0 1px 4px rgba(0,0,0,.04); display:flex; flex-direction:column; align-items:center; text-align:center; }
        .gauge-card-title { font-size:13.5px; font-weight:700; color:#374151; margin-bottom:12px; }
        .gauge-ticks { display:flex; justify-content:space-between; width:200px; margin-top:6px; }
        .gauge-ticks span { font-size:10px; color:#9ca3af; font-weight:500; }
        .gauge-level    { font-size:20px; font-weight:800; margin-bottom:4px; margin-top:10px; }
        .gauge-sublabel { font-size:12px; color:#6b7280; line-height:1.4; }
        .summary-card  { background:white; border-radius:14px; border:1px solid #e5e7eb; padding:24px; box-shadow:0 1px 4px rgba(0,0,0,.04); }
        .summary-card-title { font-size:13.5px; font-weight:700; color:#374151; margin-bottom:14px; padding-bottom:12px; border-bottom:1px solid #f3f4f6; }
        .summary-row   { display:flex; justify-content:space-between; align-items:flex-start; padding:10px 0; border-bottom:1px solid #f9fafb; gap:8px; }
        .summary-row:last-child { border-bottom:none; }
        .summary-row-label { font-size:12.5px; color:#6b7280; flex:1; }
        .summary-row-value { font-size:13.5px; font-weight:700; color:#111827; text-align:right; white-space:nowrap; }
        .summary-row-value .unit { font-size:11px; font-weight:400; color:#9ca3af; }
        .summary-row-value.green { color:#2e7d32; font-size:15px; }
        .badge-ok   { display:inline-flex; align-items:center; gap:4px; font-size:11px; font-weight:700; background:#f0fdf4; color:#16a34a; padding:3px 8px; border-radius:20px; margin-top:4px; }
        .badge-warn { display:inline-flex; align-items:center; gap:4px; font-size:11px; font-weight:700; background:#fef9c3; color:#b45309; padding:3px 8px; border-radius:20px; margin-top:4px; }
        .charts-row  { display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:16px; }
        .chart-card  { background:white; border-radius:14px; border:1px solid #e5e7eb; padding:24px 28px; box-shadow:0 1px 4px rgba(0,0,0,.04); }
        .chart-card-header { display:flex; align-items:center; justify-content:space-between; margin-bottom:20px; }
        .chart-card-header h3 { font-size:13.5px; font-weight:700; color:#374151; }
        .chart-filter { border:1.5px solid #e5e7eb; border-radius:8px; padding:5px 10px; font-size:12.5px; font-family:inherit; color:#374151; background:white; cursor:pointer; font-weight:500; }
        .chart-tip   { display:flex; align-items:center; gap:8px; margin-top:14px; padding-top:12px; border-top:1px solid #f3f4f6; font-size:11.5px; color:#9ca3af; }
        .chart-tip i { color:#2e7d32; font-size:13px; flex-shrink:0; }
        .donut-wrap  { display:flex; align-items:center; gap:24px; }
        .donut-canvas-wrap { position:relative; flex-shrink:0; width:150px; height:150px; }
        .donut-canvas-wrap canvas { width:150px !important; height:150px !important; }
        .donut-center { position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); text-align:center; pointer-events:none; }
        .donut-center strong { display:block; font-size:17px; font-weight:800; color:#111827; }
        .donut-center span   { font-size:10px; color:#9ca3af; }
        .donut-legend { flex:1; display:flex; flex-direction:column; gap:8px; }
        .legend-item  { display:flex; align-items:center; gap:8px; padding:5px 8px; border-radius:8px; }
        .legend-dot   { width:9px; height:9px; border-radius:50%; flex-shrink:0; }
        .legend-icon  { font-size:14px; width:18px; text-align:center; }
        .legend-name  { font-size:12.5px; color:#374151; font-weight:500; flex:1; }
        .legend-val   { font-size:12.5px; font-weight:700; color:#111827; }
        .legend-pct   { font-size:11px; color:#9ca3af; }
        .line-canvas-wrap { position:relative; height:170px; }
        .bottom-row  { display:grid; grid-template-columns:1fr 290px; gap:16px; margin-bottom:80px; }
        .rec-card    { background:white; border-radius:14px; border:1px solid #e5e7eb; padding:24px 28px; box-shadow:0 1px 4px rgba(0,0,0,.04); }
        .rec-card-header { display:flex; align-items:center; gap:8px; margin-bottom:16px; padding-bottom:12px; border-bottom:1px solid #f3f4f6; }
        .rec-card-header h3 { font-size:14px; font-weight:700; color:#111827; }
        .rec-grid    { display:grid; grid-template-columns:repeat(2,1fr); gap:12px; }
        .rec-item    { border:1.5px solid #e5e7eb; border-radius:12px; padding:16px; display:flex; flex-direction:column; gap:8px; }
        .rec-item-top { display:flex; align-items:center; gap:10px; }
        .rec-icon    { width:36px; height:36px; border-radius:10px; background:#f0fdf4; display:flex; align-items:center; justify-content:center; font-size:17px; color:#2e7d32; flex-shrink:0; }
        .rec-item h4 { font-size:13px; font-weight:700; color:#111827; }
        .rec-item p  { font-size:12px; color:#6b7280; line-height:1.45; margin:0; }
        .impact-badge      { display:inline-flex; align-items:center; gap:4px; font-size:11px; font-weight:700; padding:3px 8px; border-radius:20px; width:fit-content; }
        .impact-badge.alto { background:#fef2f2; color:#dc2626; }
        .impact-badge.medio{ background:#fffbeb; color:#d97706; }
        .steps-card  { background:white; border-radius:14px; border:1px solid #e5e7eb; padding:24px; box-shadow:0 1px 4px rgba(0,0,0,.04); display:flex; flex-direction:column; gap:10px; }
        .steps-card h3 { font-size:14px; font-weight:700; color:#111827; margin-bottom:6px; padding-bottom:12px; border-bottom:1px solid #f3f4f6; }
        .step-link   { display:flex; align-items:center; gap:12px; padding:11px 14px; border:1.5px solid #e5e7eb; border-radius:10px; text-decoration:none; color:#374151; font-size:13.5px; font-weight:600; }
        .step-link:hover { border-color:#86efac; background:#f0fdf4; color:#2e7d32; }
        .step-link i { font-size:16px; color:#2e7d32; }
        .btn-home    { background:#2e7d32; color:white; border:none; padding:14px 20px; border-radius:10px; cursor:pointer; font-size:14px; font-weight:600; font-family:inherit; display:flex; align-items:center; justify-content:center; gap:8px; text-decoration:none; margin-top:4px; }
        .btn-home:hover { background:#1b5e20; color:white; }
        .results-page-header { display:flex; align-items:flex-start; justify-content:space-between; margin-bottom:20px; }
        .page-meta   { display:flex; align-items:center; gap:10px; margin-bottom:6px; }
        .page-meta span { font-size:13px; color:#6b7280; }
        .company-badge { background:#e8f5e9; color:#2e7d32; font-size:12px; font-weight:700; padding:3px 10px; border-radius:20px; }
        .btn-detail  { display:flex; align-items:center; gap:6px; border:1.5px solid #d1d5db; color:#374151; background:white; padding:9px 18px; border-radius:10px; font-size:13px; font-weight:600; font-family:inherit; cursor:pointer; text-decoration:none; }
        .btn-report  { display:flex; align-items:center; gap:6px; border:1.5px solid #e5e7eb; color:#374151; background:white; padding:7px 16px; border-radius:8px; font-size:13.5px; font-weight:600; text-decoration:none; }
        .sidebar-msg { background:#f0fdf4; border:1px solid #bbf7d0; border-radius:12px; padding:16px; margin-top:24px; }
        .sidebar-msg-icon { font-size:24px; margin-bottom:8px; display:block; }
        .sidebar-msg p     { font-size:13px; color:#374151; font-weight:700; margin-bottom:4px; }
        .sidebar-msg small { font-size:12px; color:#6b7280; display:block; }
    </style>
</head>

<body>

<header class="topbar">
    <div class="logo-area">
        <a class="navbar-brand" href="/"><img src="{{ asset('img/LogoEcoCarbon.png') }}" alt="EcoCarbon" class="logo-ecocarbon"></a>
    </div>
    <div class="wizard">
        <div class="wizard-step done"><div class="circle">✓</div><span>Dados da Empresa</span></div>
        <div class="line"></div>
        <div class="wizard-step done"><div class="circle">✓</div><span>Fontes de Emissão</span></div>
        <div class="line"></div>
        <div class="wizard-step done"><div class="circle">✓</div><span>Revisão</span></div>
        <div class="line"></div>
        <div class="wizard-step active"><div class="circle">4</div><span>Resultados</span></div>
    </div>
    <div class="user-area">
        <a href="#" class="btn-report"><i class="fi fi-rr-download"></i> Relatório</a>
        <a href="#" style="border:none; padding:0;"><i class="fi fi-rr-bell" style="font-size:18px; color:#6b7280;"></i></a>
        <div class="user-info">
            <div class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</div>
            <span>{{ auth()->user()->empresa ?? auth()->user()->name }}</span>
            &#8964;
        </div>
    </div>
</header>

<div class="dashboard">

    <aside class="sidebar">
       <nav>
                <a href="{{ route('dashboard') }}">
                    <span class="nav-icon"><i class="fi fi-rr-home"></i></span>
                    Início
                </a>
                <a href="{{ route('calculo.novo') }}">
                    <span class="nav-icon"><i class="fi fi-ts-clipboard"></i></span>
                    Novo Cálculo
                </a>
                <a href="{{ route('historico.emissoes') }}">
                    <span class="nav-icon"><i class="fi fi-tr-folder-open"></i></span>
                    Meus Cálculos
                </a>
                <a class="active" href="{{ route('relatorios') }}">
                    <span class="nav-icon"><i class="fi fi-tr-file-spreadsheet"></i></span>
                    Relatórios
                </a>
                <a href="{{ route('metodologia') }}">
                    <span class="nav-icon"><i class="fi fi-ts-book-open-cover"></i></span>
                    Metodologia
                </a>
                <a href="{{ route('calculo.revisao') }}">
                    <span class="nav-icon"><i class="fi fi-ts-book-open-cover"></i></span>
                    Revisão
                </a>
            </nav>
        <div>
            <div class="sidebar-msg">
                <span class="sidebar-msg-icon"><i class="fi fi-tr-leaf-fall" style="font-size:22px; color:#2e7d32;"></i></span>
                <p>Cada cálculo conta para um futuro mais sustentável.</p>
                <small>Continue medindo, reduzindo e inspirando mudanças positivas.</small>
            </div>
            <div class="theme-toggle">
                <span>Tema</span>
                <div class="toggle-btns"><button class="active">☀️</button><button>🌙</button></div>
            </div>
        </div>
    </aside>

    <main class="content">

        <div class="results-page-header">
            <div>
                <div class="page-title"><h2>Resultado da Pegada de Carbono</h2></div>
                <div class="page-meta">
                    <span>Período avaliado: Janeiro a Dezembro de {{ $calculo->ano_referencia }}</span>
                    <span class="company-badge">{{ $calculo->empresa }}</span>
                </div>
            </div>
            <a href="#" class="btn-detail"><i class="fi fi-rr-list"></i> Ver Detalhamento Completo</a>
        </div>

        {{-- LINHA 1 --}}
        <div class="results-top-row">

            {{-- Hero --}}
            <div class="result-hero">
                <div>
                    <div class="hero-label"><i class="fi fi-rr-interrogation" style="font-size:11px; opacity:.7;"></i> Emissão Total</div>
                    <div class="hero-value">{{ number_format($total, 2, ',', '.') }}</div>
                    <div class="hero-unit">tCO₂e/ano</div>
                </div>
                <div class="hero-equiv">
                    <div class="equiv-item">
                        <div class="equiv-icon"><i class="fi fi-tr-leaf-fall" style="font-size:20px; color:white;"></i></div>
                        <div class="equiv-text">
                            <strong>{{ number_format($arvores, 0, ',', '.') }}</strong>
                            <span>árvores plantadas<br>por 10 anos</span>
                        </div>
                    </div>
                    <div class="equiv-item">
                        <div class="equiv-icon"><i class="fi fi-rr-car-side" style="font-size:18px; color:white;"></i></div>
                        <div class="equiv-text">
                            <strong>{{ number_format($kmCarro, 0, ',', '.') }}</strong>
                            <span>km rodados por<br>um carro popular</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Gauge --}}
            <div class="gauge-card">
                <div class="gauge-card-title">Classificação do Impacto</div>
                {{-- canvas: 200x115, centro do arco em cy=123 (8px abaixo da borda) --}}
                <canvas id="gaugeCanvas"
                        data-total="{{ $total }}"
                        style="display:block; margin:0 auto 4px; width:200px; height:115px;"></canvas>
                <div class="gauge-ticks"><span>Baixo</span><span>Moderado</span><span>Alto</span></div>
                <div class="gauge-level" style="color:{{ $nivelColor }};">{{ $nivel }}</div>
                <div class="gauge-sublabel">
                    @if($nivel === 'Baixo')
                        Parabéns! Sua empresa está abaixo da média de mercado.
                    @elseif($nivel === 'Moderado')
                        Sua empresa está próxima da média de mercado.
                    @else
                        Atenção: emissões elevadas. Ação imediata recomendada.
                    @endif
                </div>
            </div>

            {{-- Resumo --}}
            <div class="summary-card">
                <div class="summary-card-title">Resumo das Emissões</div>
                <div class="summary-row">
                    <span class="summary-row-label">Emissão Total</span>
                    <span class="summary-row-value green">{{ $totalFmt }} <span class="unit">tCO₂e/ano</span></span>
                </div>
                <div class="summary-row">
                    <span class="summary-row-label">Emissão por Funcionário</span>
                    <span class="summary-row-value">
                        {{ number_format($calculo->funcionarios > 0 ? $total / $calculo->funcionarios : 0, 2, ',', '.') }}
                        <span class="unit">tCO₂e/ano</span>
                    </span>
                </div>
                <div class="summary-row" style="flex-direction:column; align-items:flex-start;">
                    <span class="summary-row-label">Variação vs. ano anterior</span>
                    @if($variacao !== null)
                        <span class="summary-row-value {{ $variacao <= 0 ? 'green' : '' }}" style="margin-top:4px;">
                            <i class="fi fi-rr-arrow-trend-{{ $variacao <= 0 ? 'down' : 'up' }}" style="font-size:13px;"></i>
                            {{ $variacao > 0 ? '+' : '' }}{{ number_format($variacao, 1, ',', '.') }}%
                        </span>
                        @if($variacao <= 0)
                            <span class="badge-ok"><i class="fi fi-rr-check" style="font-size:10px;"></i> Você reduziu suas emissões!</span>
                        @else
                            <span class="badge-warn">⚠ Emissões aumentaram</span>
                        @endif
                    @else
                        <span class="summary-row-value" style="margin-top:4px; color:#9ca3af; font-size:12px;">Sem dados do ano anterior</span>
                    @endif
                </div>
            </div>

        </div>

        {{-- LINHA 2: Gráficos --}}
        <div class="charts-row">

            {{-- Donut --}}
            <div class="chart-card">
                <div class="chart-card-header">
                    <h3>Distribuição das Emissões por Fonte</h3>
                </div>
                <div class="donut-wrap">
                    <div class="donut-canvas-wrap">
                        <canvas id="donutChart"></canvas>
                        <div class="donut-center">
                            <strong>{{ $totalFmt }}</strong>
                            <span>tCO₂e/ano</span>
                        </div>
                    </div>
                    <div class="donut-legend">
                        <div class="legend-item">
                            <div class="legend-dot" style="background:#2e7d32;"></div>
                            <span class="legend-icon"><i class="fi fi-sr-bolt" style="color:#ca8a04;"></i></span>
                            <span class="legend-name">Energia</span>
                            <span class="legend-val">{{ number_format($energia, 1, ',', '.') }} <span class="legend-pct">{{ $pct($energia) }}%</span></span>
                        </div>
                        <div class="legend-item">
                            <div class="legend-dot" style="background:#1d4ed8;"></div>
                            <span class="legend-icon"><i class="fi fi-ss-truck-side" style="color:#1d4ed8;"></i></span>
                            <span class="legend-name">Transporte</span>
                            <span class="legend-val">{{ number_format($transp, 1, ',', '.') }} <span class="legend-pct">{{ $pct($transp) }}%</span></span>
                        </div>
                        <div class="legend-item">
                            <div class="legend-dot" style="background:#d97706;"></div>
                            <span class="legend-icon"><i class="fi fi-sr-trash-can-check" style="color:#d97706;"></i></span>
                            <span class="legend-name">Resíduos</span>
                            <span class="legend-val">{{ number_format($resid, 1, ',', '.') }} <span class="legend-pct">{{ $pct($resid) }}%</span></span>
                        </div>
                        <div class="legend-item">
                            <div class="legend-dot" style="background:#7c3aed;"></div>
                            <span class="legend-icon"><i class="fi fi-ss-plane-alt" style="color:#7c3aed;"></i></span>
                            <span class="legend-name">Viagens</span>
                            <span class="legend-val">{{ number_format($viag, 1, ',', '.') }} <span class="legend-pct">{{ $pct($viag) }}%</span></span>
                        </div>
                        <div class="legend-item">
                            <div class="legend-dot" style="background:#0891b2;"></div>
                            <span class="legend-icon"><i class="fi fi-ss-shopping-cart" style="color:#0891b2;"></i></span>
                            <span class="legend-name">Compras</span>
                            <span class="legend-val">{{ number_format($comp, 1, ',', '.') }} <span class="legend-pct">{{ $pct($comp) }}%</span></span>
                        </div>
                    </div>
                </div>
                <div class="chart-tip"><i class="fi fi-rr-interrogation"></i> Clique em uma categoria para ver mais detalhes e recomendações específicas.</div>
            </div>

            {{-- Line --}}
            <div class="chart-card">
                <div class="chart-card-header">
                    <h3>Evolução das Emissões <span style="font-size:11px; font-weight:400; color:#9ca3af;">(tCO₂e/ano)</span></h3>
                    <select class="chart-filter"><option>Anual</option><option>Semestral</option></select>
                </div>
                <div class="line-canvas-wrap">
                    <canvas id="lineChart"></canvas>
                </div>
                <div class="chart-tip">
                    <i class="fi fi-rr-interrogation"></i>
                    @if($variacao !== null)
                        {{ $variacao <= 0 ? 'Redução' : 'Aumento' }} de {{ number_format(abs($variacao), 1, ',', '.') }}% nas emissões em relação ao ano anterior.
                    @else
                        Sem dados de anos anteriores para comparar.
                    @endif
                </div>
            </div>

        </div>

        {{-- LINHA 3 --}}
        <div class="bottom-row">
            <div class="rec-card">
                <div class="rec-card-header">
                    <i class="fi fi-tr-leaf-fall" style="font-size:18px; color:#2e7d32;"></i>
                    <h3>Principais Recomendações</h3>
                </div>
                <div class="rec-grid">
                    <div class="rec-item">
                        <div class="rec-item-top"><div class="rec-icon"><i class="fi fi-sr-bolt"></i></div><h4>Reduzir consumo de energia</h4></div>
                        <p>Invista em eficiência energética e equipamentos mais eficientes.</p>
                        <span class="impact-badge alto"><i class="fi fi-sr-circle" style="font-size:8px;"></i> Alto impacto</span>
                    </div>
                    <div class="rec-item">
                        <div class="rec-item-top"><div class="rec-icon"><i class="fi fi-tr-leaf-fall"></i></div><h4>Adotar energia renovável</h4></div>
                        <p>Troque sua matriz energética por fontes renováveis.</p>
                        <span class="impact-badge alto"><i class="fi fi-sr-circle" style="font-size:8px;"></i> Alto impacto</span>
                    </div>
                    <div class="rec-item">
                        <div class="rec-item-top"><div class="rec-icon"><i class="fi fi-ss-truck-side"></i></div><h4>Otimizar logística</h4></div>
                        <p>Planeje rotas e incentive transportes com menor emissão.</p>
                        <span class="impact-badge medio"><i class="fi fi-sr-circle" style="font-size:8px;"></i> Médio impacto</span>
                    </div>
                    <div class="rec-item">
                        <div class="rec-item-top"><div class="rec-icon"><i class="fi fi-sr-trash-can-check"></i></div><h4>Gestão de resíduos</h4></div>
                        <p>Aumente a reciclagem e reduza o envio para aterros.</p>
                        <span class="impact-badge medio"><i class="fi fi-sr-circle" style="font-size:8px;"></i> Médio impacto</span>
                    </div>
                </div>
            </div>

            <div class="steps-card">
                <h3>Próximos Passos</h3>
                <a href="#" class="step-link"><i class="fi fi-tr-file-spreadsheet"></i> Gerar Relatório Completo (PDF)</a>
                <a href="#" class="step-link"><i class="fi fi-tr-folder-open"></i> Exportar Dados (Excel)</a>
                <a href="{{ route('calculo.novo') }}" class="step-link"><i class="fi fi-ts-clipboard"></i> Novo Cálculo</a>
                <a href="{{ route('dashboard') }}" class="btn-home"><i class="fi fi-rr-home"></i> Voltar ao Início</a>
            </div>
        </div>

    </main>
</div>

<script>
// ── Gauge ─────────────────────────────────────────────────────────────
(function () {
    const canvas = document.getElementById('gaugeCanvas');
    if (!canvas) return;
    const ctx   = canvas.getContext('2d');
    const total = parseFloat(canvas.dataset.total) || 0;

    const W = 200, H = 115;
    canvas.width  = W;
    canvas.height = H;

    // Centro na borda inferior visível, arco cresce para cima
    const cx   = W / 2;  // 100
    const cy   = H - 2;  // 113 — dentro do canvas, base do semicírculo
    const rOut = 100;
    const rIn  = 60;

    ctx.clearRect(0, 0, W, H);

    // Arco em anel: ângulos de π (esquerda) a 2π (direita), sentido horário
    // No canvas Y cresce pra baixo, então esses ângulos formam o semicírculo SUPERIOR
    const zones = [
        { from: Math.PI,          to: Math.PI * 4 / 3, color: '#22c55e' },
        { from: Math.PI * 4 / 3, to: Math.PI * 5 / 3, color: '#fbbf24' },
        { from: Math.PI * 5 / 3, to: Math.PI * 2,     color: '#f97316' },
    ];

    zones.forEach(({ from, to, color }) => {
        ctx.beginPath();
        ctx.arc(cx, cy, rOut, from, to);
        ctx.arc(cx, cy, rIn,  to, from, true);
        ctx.closePath();
        ctx.fillStyle = color;
        ctx.fill();
    });

    // Separadores
    [Math.PI * 4 / 3, Math.PI * 5 / 3].forEach(a => {
        ctx.beginPath();
        ctx.moveTo(cx + rIn  * Math.cos(a), cy + rIn  * Math.sin(a));
        ctx.lineTo(cx + rOut * Math.cos(a), cy + rOut * Math.sin(a));
        ctx.strokeStyle = '#ffffff';
        ctx.lineWidth   = 2.5;
        ctx.stroke();
    });

    // Agulha
    const maxRef = 500;
    const ratio  = Math.min(Math.max(total / maxRef, 0), 1);
    const angle  = Math.PI + ratio * Math.PI;
    const nLen   = rIn - 10;  // comprimento dentro do buraco

    const tipX = cx + nLen * Math.cos(angle);
    const tipY = cy + nLen * Math.sin(angle);  // sin negativo → vai para cima ✓

    ctx.beginPath();
    ctx.moveTo(cx, cy);
    ctx.lineTo(tipX, tipY);
    ctx.strokeStyle = '#1f2937';
    ctx.lineWidth   = 2.5;
    ctx.lineCap     = 'round';
    ctx.stroke();

    // Ponto central — dentro do canvas
    ctx.beginPath();
    ctx.arc(cx, cy, 5, 0, Math.PI * 2);
    ctx.fillStyle = '#1f2937';
    ctx.fill();
})();

// ── Donut ─────────────────────────────────────────────────────────────
const donutData = {
    labels: ['Energia', 'Transporte', 'Resíduos', 'Viagens', 'Compras'],
    values: [
        {{ $energia }},
        {{ $transp }},
        {{ $resid }},
        {{ $viag }},
        {{ $comp }},
    ],
    colors: ['#2e7d32','#1d4ed8','#d97706','#7c3aed','#0891b2'],
};

new Chart(document.getElementById('donutChart').getContext('2d'), {
    type: 'doughnut',
    data: {
        labels: donutData.labels,
        datasets: [{
            data: donutData.values,
            backgroundColor: donutData.colors,
            borderWidth: 3,
            borderColor: '#ffffff',
            hoverOffset: 6,
        }]
    },
    options: {
        cutout: '68%',
        responsive: false,
        plugins: {
            legend: { display: false },
            tooltip: { callbacks: { label: ctx => ` ${ctx.label}: ${ctx.parsed} tCO₂e` } }
        }
    }
});

// ── Linha histórico ───────────────────────────────────────────────────
const historicoData = {
    anos:   {!! $historico->pluck('ano') !!},
    totais: {!! $historico->pluck('total') !!},
};

new Chart(document.getElementById('lineChart').getContext('2d'), {
    type: 'line',
    data: {
        labels: historicoData.anos,
        datasets: [{
            label: 'tCO₂e/ano',
            data: historicoData.totais,
            borderColor: '#2e7d32',
            backgroundColor: 'rgba(46,125,50,0.08)',
            borderWidth: 2.5,
            pointBackgroundColor: '#2e7d32',
            pointBorderColor: '#ffffff',
            pointBorderWidth: 2,
            pointRadius: 5,
            pointHoverRadius: 7,
            fill: true,
            tension: 0.35,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false },
            tooltip: { callbacks: { label: ctx => ` ${ctx.parsed.y} tCO₂e/ano` } }
        },
        scales: {
            x: { grid: { display: false }, ticks: { font: { size: 12 }, color: '#9ca3af' } },
            y: { grid: { color: '#f3f4f6' }, ticks: { font: { size: 11 }, color: '#9ca3af', stepSize: 20 } }
        }
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>