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

    <!-- Chart.js para donut e line chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>

</head>

<body>

    <!-- HEADER -->
    <header class="topbar">

        <div class="logo-area">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/LogoEcoCarbon.png') }}" alt="EcoCarbon" class="logo-ecocarbon">
            </a>
        </div>

        <div class="wizard">
            <div class="wizard-step done">
                <div class="circle">✓</div>
                <span>Dados da Empresa</span>
            </div>
            <div class="line"></div>
            <div class="wizard-step done">
                <div class="circle">✓</div>
                <span>Fontes de Emissão</span>
            </div>
            <div class="line"></div>
            <div class="wizard-step done">
                <div class="circle">✓</div>
                <span>Revisão</span>
            </div>
            <div class="line"></div>
            <div class="wizard-step active">
                <div class="circle">4</div>
                <span>Resultados</span>
            </div>
        </div>

        <div class="user-area">
            <a href="#" class="btn-report">
                <i class="fi fi-rr-download"></i> Relatório
            </a>
            <a href="#" style="border:none; padding:0;">
                <i class="fi fi-rr-bell" style="font-size:18px; color:#6b7280;"></i>
            </a>
            <div class="user-info">
                <div class="avatar">AC</div>
                <span>Alpha Tecnologia</span>
                &#8964;
            </div>
        </div>

    </header>

    <div class="dashboard">

        <!-- SIDEBAR -->
        <aside class="sidebar">
            <nav>
                <a href="#">
                    <span class="nav-icon"><i class="fi fi-rr-home"></i></span> Início
                </a>
                <a class="active" href="#">
                    <span class="nav-icon"><i class="fi fi-ts-clipboard"></i></span> Novo Cálculo
                </a>
                <a href="#">
                    <span class="nav-icon"><i class="fi fi-tr-folder-open"></i></span> Meus Cálculos
                </a>
                <a href="#">
                    <span class="nav-icon"><i class="fi fi-tr-file-spreadsheet"></i></span> Relatórios
                </a>
                <a href="#">
                    <span class="nav-icon"><i class="fi fi-rr-time-past"></i></span> Histórico de Emissões
                </a>
                <a href="#">
                    <span class="nav-icon"><i class="fi fi-ts-book-open-cover"></i></span> Metodologia
                </a>
                <a href="#">
                    <span class="nav-icon"><i class="fi fi-tr-carbon-cloud"></i></span> Fatores de Emissão
                </a>
                <a href="#">
                    <span class="nav-icon"><i class="fi fi-rr-interrogation"></i></span> Dúvidas Frequentes
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
                    <div class="toggle-btns">
                        <button class="active">☀️</button>
                        <button>🌙</button>
                    </div>
                </div>
            </div>
        </aside>

        <!-- CONTEÚDO -->
        <main class="content">

            <!-- Cabeçalho -->
            <div class="results-page-header">
                <div>
                    <div class="page-title">
                        <h2>Resultado da Pegada de Carbono</h2>
                    </div>
                    <div class="page-meta">
                        <span>Período avaliado: Janeiro a Dezembro de 2024</span>
                        <span class="company-badge">Alpha Tecnologia</span>
                    </div>
                </div>
                <a href="#" class="btn-detail">
                    <i class="fi fi-rr-list"></i> Ver Detalhamento Completo
                </a>
            </div>

            <!-- LINHA 1 -->
            <div class="results-top-row">

                <!-- Hero: Emissão Total -->
                <div class="result-hero">
                    <div>
                        <div class="hero-label">
                            <i class="fi fi-rr-interrogation" style="font-size:11px; opacity:.7;"></i>
                            Emissão Total
                        </div>
                        <div class="hero-value">52,8</div>
                        <div class="hero-unit">tCO₂e/ano</div>
                    </div>
                    <div class="hero-equiv">
                        <div class="equiv-item">
                            <div class="equiv-icon">
                                <i class="fi fi-tr-leaf-fall" style="font-size:20px; color:white;"></i>
                            </div>
                            <div class="equiv-text">
                                <strong>378</strong>
                                <span>árvores plantadas<br>por 10 anos</span>
                            </div>
                        </div>
                        <div class="equiv-item">
                            <div class="equiv-icon">
                                <i class="fi fi-rr-car-side" style="font-size:18px; color:white;"></i>
                            </div>
                            <div class="equiv-text">
                                <strong>231.404</strong>
                                <span>km rodados por<br>um carro popular</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gauge: Classificação do Impacto -->
                <div class="gauge-card">
                    <div class="gauge-card-title">
                        Classificação do Impacto
                        <i class="fi fi-rr-interrogation"></i>
                    </div>

                    <div class="gauge-arc-wrap">
                        <div class="gauge-arc-bg"></div>
                        <div class="gauge-arc-inner"></div>
                        <!-- Agulha -->
                        <div class="gauge-needle-wrap">
                            <div class="gauge-needle"></div>
                            <div class="gauge-dot"></div>
                        </div>
                        <!-- Ícone de folha no centro do arco -->
                        <div style="position:absolute; bottom:8px; left:50%; transform:translateX(-50%); font-size:18px; color:#2e7d32; z-index:2;">
                            <i class="fi fi-tr-leaf-fall"></i>
                        </div>
                    </div>

                    <div class="gauge-ticks">
                        <span>Baixo</span>
                        <span>Moderado</span>
                        <span>Alto</span>
                    </div>

                    <div class="gauge-level" style="margin-top:14px;">Moderado</div>
                    <div class="gauge-sublabel">Sua empresa está acima<br>da média de mercado.</div>
                </div>

                <!-- Resumo -->
                <div class="summary-card">
                    <div class="summary-card-title">Resumo das Emissões</div>

                    <div class="summary-row">
                        <span class="summary-row-label">Emissão Total</span>
                        <span class="summary-row-value green">52,8 <span class="unit">tCO₂e/ano</span></span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-row-label">Emissão por Funcionário</span>
                        <span class="summary-row-value">0,35 <span class="unit">tCO₂e/ano</span></span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-row-label">Emissão por Faturamento</span>
                        <span class="summary-row-value">0,012 <span class="unit">tCO₂e/R$ mil</span></span>
                    </div>
                    <div class="summary-row" style="flex-direction:column; align-items:flex-start;">
                        <span class="summary-row-label">Variação vs. ano anterior</span>
                        <span class="summary-row-value green" style="margin-top:4px;">
                            <i class="fi fi-rr-arrow-trend-down" style="font-size:13px;"></i> 12,4%
                        </span>
                        <span class="badge-ok">
                            <i class="fi fi-rr-check" style="font-size:10px;"></i>
                            Você reduziu suas emissões!
                        </span>
                    </div>
                </div>

            </div>

            <!-- LINHA 2: Donut + Linha -->
            <div class="charts-row">

                <!-- Donut: Distribuição por Fonte -->
                <div class="chart-card">
                    <div class="chart-card-header">
                        <h3>Distribuição das Emissões por Fonte</h3>
                    </div>
                    <div class="donut-wrap">
                        <div class="donut-canvas-wrap">
                            <canvas id="donutChart"></canvas>
                            <div class="donut-center">
                                <strong>52,8</strong>
                                <span>tCO₂e/ano</span>
                            </div>
                        </div>
                        <div class="donut-legend">
                            <div class="legend-item">
                                <div class="legend-dot" style="background:#2e7d32;"></div>
                                <span class="legend-icon"><i class="fi fi-sr-bolt" style="color:#ca8a04;"></i></span>
                                <span class="legend-name">Energia</span>
                                <span class="legend-val">21,1 <span class="legend-pct">40%</span></span>
                            </div>
                            <div class="legend-item">
                                <div class="legend-dot" style="background:#1d4ed8;"></div>
                                <span class="legend-icon"><i class="fi fi-ss-truck-side" style="color:#1d4ed8;"></i></span>
                                <span class="legend-name">Transporte</span>
                                <span class="legend-val">18,5 <span class="legend-pct">35%</span></span>
                            </div>
                            <div class="legend-item">
                                <div class="legend-dot" style="background:#d97706;"></div>
                                <span class="legend-icon"><i class="fi fi-sr-trash-can-check" style="color:#d97706;"></i></span>
                                <span class="legend-name">Resíduos</span>
                                <span class="legend-val">7,9 <span class="legend-pct">15%</span></span>
                            </div>
                            <div class="legend-item">
                                <div class="legend-dot" style="background:#7c3aed;"></div>
                                <span class="legend-icon"><i class="fi fi-ss-plane-alt" style="color:#7c3aed;"></i></span>
                                <span class="legend-name">Viagens de Negócios</span>
                                <span class="legend-val">5,3 <span class="legend-pct">10%</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="chart-tip">
                        <i class="fi fi-rr-interrogation"></i>
                        Clique em uma categoria para ver mais detalhes e recomendações específicas.
                    </div>
                </div>

                <!-- Line: Evolução -->
                <div class="chart-card">
                    <div class="chart-card-header">
                        <h3>Evolução das Emissões <span style="font-size:11px; font-weight:400; color:#9ca3af;">(tCO₂e/ano)</span></h3>
                        <select class="chart-filter">
                            <option>Anual</option>
                            <option>Semestral</option>
                        </select>
                    </div>
                    <div class="line-canvas-wrap">
                        <canvas id="lineChart"></canvas>
                    </div>
                    <div class="chart-tip">
                        <i class="fi fi-rr-interrogation"></i>
                        Redução de 12,4% nas emissões em relação ao ano anterior.
                    </div>
                </div>

            </div>

            <!-- LINHA 3: Recomendações + Próximos Passos -->
            <div class="bottom-row">

                <div class="rec-card">
                    <div class="rec-card-header">
                        <i class="fi fi-tr-leaf-fall" style="font-size:18px; color:#2e7d32;"></i>
                        <h3>Principais Recomendações</h3>
                    </div>
                    <div class="rec-grid">

                        <div class="rec-item">
                            <div class="rec-item-top">
                                <div class="rec-icon"><i class="fi fi-sr-bolt"></i></div>
                                <h4>Reduzir consumo de energia</h4>
                            </div>
                            <p>Invista em eficiência energética e equipamentos mais eficientes.</p>
                            <span class="impact-badge alto">
                                <i class="fi fi-sr-circle" style="font-size:8px;"></i> Alto impacto
                            </span>
                        </div>

                        <div class="rec-item">
                            <div class="rec-item-top">
                                <div class="rec-icon"><i class="fi fi-tr-leaf-fall"></i></div>
                                <h4>Adotar energia renovável</h4>
                            </div>
                            <p>Troque sua matriz energética por fontes renováveis.</p>
                            <span class="impact-badge alto">
                                <i class="fi fi-sr-circle" style="font-size:8px;"></i> Alto impacto
                            </span>
                        </div>

                        <div class="rec-item">
                            <div class="rec-item-top">
                                <div class="rec-icon"><i class="fi fi-ss-truck-side"></i></div>
                                <h4>Otimizar logística</h4>
                            </div>
                            <p>Planeje rotas e incentive transportes com menor emissão.</p>
                            <span class="impact-badge medio">
                                <i class="fi fi-sr-circle" style="font-size:8px;"></i> Médio impacto
                            </span>
                        </div>

                        <div class="rec-item">
                            <div class="rec-item-top">
                                <div class="rec-icon"><i class="fi fi-sr-trash-can-check"></i></div>
                                <h4>Gestão de resíduos</h4>
                            </div>
                            <p>Aumente a reciclagem e reduza o envio para aterros.</p>
                            <span class="impact-badge medio">
                                <i class="fi fi-sr-circle" style="font-size:8px;"></i> Médio impacto
                            </span>
                        </div>

                    </div>
                </div>

                <div class="steps-card">
                    <h3>Próximos Passos</h3>

                    <a href="#" class="step-link">
                        <i class="fi fi-tr-file-spreadsheet"></i>
                        Gerar Relatório Completo (PDF)
                    </a>
                    <a href="#" class="step-link">
                        <i class="fi fi-tr-folder-open"></i>
                        Exportar Dados (Excel)
                    </a>
                    <a href="{{ route('calculo.novo') }}" class="step-link">
                        <i class="fi fi-ts-clipboard"></i>
                        Novo Cálculo
                    </a>
                    <a href="{{ route('home') }}" class="btn-home">
                        <i class="fi fi-rr-home"></i>
                        Voltar ao Início
                    </a>
                </div>

            </div>

        </main>
    </div>

    <!-- Chart.js: Donut -->
    <script>
        const donutCtx = document.getElementById('donutChart').getContext('2d');
        new Chart(donutCtx, {
            type: 'doughnut',
            data: {
                labels: ['Energia', 'Transporte', 'Resíduos', 'Viagens de Negócios'],
                datasets: [{
                    data: [21.1, 18.5, 7.9, 5.3],
                    backgroundColor: ['#2e7d32', '#1d4ed8', '#d97706', '#7c3aed'],
                    borderWidth: 3,
                    borderColor: '#ffffff',
                    hoverOffset: 6
                }]
            },
            options: {
                cutout: '68%',
                responsive: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: ctx => ` ${ctx.label}: ${ctx.parsed} tCO₂e`
                        }
                    }
                }
            }
        });

        /* Line chart */
        const lineCtx = document.getElementById('lineChart').getContext('2d');
        new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: ['2020', '2021', '2022', '2023', '2024'],
                datasets: [{
                    label: 'tCO₂e/ano',
                    data: [72.5, 68.1, 61.3, 60.3, 52.8],
                    borderColor: '#2e7d32',
                    backgroundColor: 'rgba(46,125,50,0.08)',
                    borderWidth: 2.5,
                    pointBackgroundColor: '#2e7d32',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    fill: true,
                    tension: 0.35
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: ctx => ` ${ctx.parsed.y} tCO₂e/ano`
                        }
                    },
                    datalabels: false
                },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { font: { size: 12 }, color: '#9ca3af' }
                    },
                    y: {
                        min: 40, max: 90,
                        grid: { color: '#f3f4f6' },
                        ticks: {
                            font: { size: 11 },
                            color: '#9ca3af',
                            stepSize: 20
                        }
                    }
                }
            }
        });
    </script>

</body>
</html>