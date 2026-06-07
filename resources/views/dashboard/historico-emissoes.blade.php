<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de Emissões - EcoCarbon</title>
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
</head>

<body>

<header class="topbar">
    <div class="logo-area">
        <a class="navbar-brand" href="/"><img src="{{ asset('img/LogoEcoCarbon.png') }}" alt="EcoCarbon" class="logo-ecocarbon"></a>
    </div>
    <div></div>
    <div class="user-area">
        <a href="#">&#9432; Ajuda</a>
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
            <div class="sidebar-help">
                <span class="leaf-icon"><i class="fi fi-tr-leaf-fall"></i></span>
                <p>Dúvida sobre como preencher os dados?</p>
                <small>Acesse nosso guia rápido e veja exemplos práticos.</small>
                <a href="#">Ver guia ↗</a>
            </div>
            <div class="theme-toggle">
                <span>Tema</span>
                <div class="toggle-btns"><button class="active">☀️</button><button>🌙</button></div>
            </div>
        </div>
    </aside>

    <main class="content">

        <div class="historico-header">
            <div>
                <div class="page-title"><h2>Histórico de Emissões</h2></div>
                <p class="page-subtitle" style="padding-left:0; margin-bottom:0;">
                    Acompanhe a evolução das emissões da sua empresa ao longo do tempo.
                </p>
            </div>
            <div class="historico-filters">
                <select class="filter-select"><option>Todos os anos</option>@foreach($anos as $a)<option>{{ $a }}</option>@endforeach</select>
                <select class="filter-select">
                    <option>Todas as fontes</option>
                    <option>Energia</option><option>Transporte</option><option>Resíduos</option>
                    <option>Viagens de Negócios</option><option>Compras</option>
                </select>
                <button class="btn-exportar">
                    <i class="fi fi-rr-file-export"></i> Exportar gráfico
                    <i class="fi fi-rr-angle-small-down" style="font-size:12px;"></i>
                </button>
            </div>
        </div>

        @if(count($anos) === 0)
            <div class="alert alert-info">
                Nenhum cálculo concluído ainda. <a href="{{ route('calculo.novo') }}">Inicie seu primeiro cálculo</a>.
            </div>
        @else

        {{-- LINHA 1: Line + Redução Total --}}
        <div class="historico-grid">
            <div class="chart-card">
                <h3>Evolução das Emissões (tCO₂e/ano)</h3>
                <div class="chart-wrap"><canvas id="lineChart"></canvas></div>
            </div>
            <div class="side-card">
                <div class="side-card-label">Redução Total</div>
                <div class="side-card-period">{{ $anos[0] }} – {{ $anos[count($anos)-1] }}</div>
                <div class="side-card-value" style="color: {{ ($reducaoTotal ?? 0) <= 0 ? '#2e7d32' : '#dc2626' }};">
                    {{ $reducaoTotal !== null ? ($reducaoTotal > 0 ? '+' : '') . number_format($reducaoTotal, 1, ',', '.') . '%' : 'N/A' }}
                </div>
                <div class="side-card-desc">
                    @if($reducaoTotal !== null)
                        {{ $reducaoTotal <= 0 ? 'Redução' : 'Aumento' }} de
                        {{ number_format(abs($totais[count($totais)-1] - $totais[0]), 1, ',', '.') }} tCO₂e<br>
                        no período analisado.
                    @else
                        Apenas um período disponível.
                    @endif
                </div>
                <div class="side-card-leaf"><i class="fi fi-tr-leaf-fall"></i></div>
            </div>
        </div>

        {{-- LINHA 2: Bar + Resumo --}}
        <div class="historico-grid-bottom">
            <div class="chart-card">
                <h3>Emissões por Fonte ao Longo do Tempo (tCO₂e/ano)</h3>
                <div class="chart-wrap" style="height:220px;"><canvas id="barChart"></canvas></div>
                <div class="bar-legend">
                    <div class="bar-legend-item"><div class="bar-legend-dot" style="background:#2e7d32;"></div>Energia</div>
                    <div class="bar-legend-item"><div class="bar-legend-dot" style="background:#1d4ed8;"></div>Transporte</div>
                    <div class="bar-legend-item"><div class="bar-legend-dot" style="background:#d97706;"></div>Resíduos</div>
                    <div class="bar-legend-item"><div class="bar-legend-dot" style="background:#7c3aed;"></div>Viagens de Negócios</div>
                    <div class="bar-legend-item"><div class="bar-legend-dot" style="background:#0891b2;"></div>Compras</div>
                </div>
            </div>

            <div class="resumo-card">
                <h3>Resumo do Período</h3>

                @if($maiorEmissao)
                <div class="resumo-item">
                    <div class="resumo-icon"><i class="fi fi-sr-arrow-trend-up"></i></div>
                    <div>
                        <div class="resumo-item-label">Maior emissão</div>
                        <div class="resumo-item-value">
                            {{ number_format($maiorEmissao->total, 1, ',', '.') }}
                            <span class="unit">tCO₂e ({{ $maiorEmissao->ano_referencia }})</span>
                        </div>
                    </div>
                </div>
                @endif

                @if($menorEmissao)
                <div class="resumo-item">
                    <div class="resumo-icon"><i class="fi fi-tr-leaf-fall"></i></div>
                    <div>
                        <div class="resumo-item-label">Menor emissão</div>
                        <div class="resumo-item-value">
                            {{ number_format($maiorEmissao->total, 1, ',', '.') }}
                            <span class="unit">tCO₂e ({{ $menorEmissao->ano_referencia }})</span>
                        </div>
                    </div>
                </div>
                @endif

                <div class="resumo-item">
                    <div class="resumo-icon"><i class="fi fi-rr-chart-histogram"></i></div>
                    <div>
                        <div class="resumo-item-label">Média do período</div>
                        <div class="resumo-item-value">
                            {{ number_format($media, 1, ',', '.') }} <span class="unit">tCO₂e</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endif

    </main>
</div>

<script>
    const anos       = {!! json_encode($anos) !!};
    const totais     = {!! json_encode($totais) !!};
    const energias   = {!! json_encode($energias) !!};
    const transportes= {!! json_encode($transportes) !!};
    const residuos   = {!! json_encode($residuos) !!};
    const viagens    = {!! json_encode($viagens) !!};
    const compras    = {!! json_encode($compras) !!};

    if (anos.length > 0) {
        // ── LINE ──
        new Chart(document.getElementById('lineChart'), {
            type: 'line',
            data: {
                labels: anos,
                datasets: [{
                    label: 'tCO₂e/ano',
                    data: totais,
                    borderColor: '#2e7d32',
                    backgroundColor: 'rgba(46,125,50,0.07)',
                    borderWidth: 2.5,
                    pointBackgroundColor: '#2e7d32',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    fill: true,
                    tension: 0.35
                }]
            },
            options: {
                responsive: true, maintainAspectRatio: false,
                plugins: { legend: { display: false }, tooltip: { callbacks: { label: ctx => ` ${ctx.parsed.y} tCO₂e/ano` } } },
                scales: {
                    x: { grid: { display: false }, ticks: { font: { size: 12 }, color: '#9ca3af' } },
                    y: { grid: { color: '#f3f4f6' }, ticks: { stepSize: 20, font: { size: 11 }, color: '#9ca3af' } }
                }
            }
        });

        // ── STACKED BAR ──
        new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: anos,
                datasets: [
                    { label: 'Energia',            data: energias,    backgroundColor: '#2e7d32', borderRadius: 0 },
                    { label: 'Transporte',          data: transportes, backgroundColor: '#1d4ed8', borderRadius: 0 },
                    { label: 'Resíduos',            data: residuos,    backgroundColor: '#d97706', borderRadius: 0 },
                    { label: 'Viagens de Negócios', data: viagens,     backgroundColor: '#7c3aed', borderRadius: 0 },
                    { label: 'Compras',             data: compras,     backgroundColor: '#0891b2', borderRadius: { topLeft: 6, topRight: 6 } },
                ]
            },
            options: {
                responsive: true, maintainAspectRatio: false,
                plugins: { legend: { display: false }, tooltip: { callbacks: { label: ctx => ` ${ctx.dataset.label}: ${ctx.parsed.y} tCO₂e` } } },
                scales: {
                    x: { stacked: true, grid: { display: false }, ticks: { font: { size: 12 }, color: '#9ca3af' } },
                    y: { stacked: true, min: 0, grid: { color: '#f3f4f6' }, ticks: { stepSize: 20, font: { size: 11 }, color: '#9ca3af' } }
                }
            }
        });
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>