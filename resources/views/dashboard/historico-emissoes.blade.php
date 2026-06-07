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

    <!-- HEADER -->
    <header class="topbar">

        <div class="logo-area">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/LogoEcoCarbon.png') }}" alt="EcoCarbon" class="logo-ecocarbon">
            </a>
        </div>

        <div></div>

        <div class="user-area">
            <a href="#">&#9432; Ajuda</a>
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
                    <span class="nav-icon"><i class="fi fi-rr-home"></i></span>
                    Início
                </a>
                <a href="#">
                    <span class="nav-icon"><i class="fi fi-ts-clipboard"></i></span>
                    Novo Cálculo
                </a>
                <a href="#">
                    <span class="nav-icon"><i class="fi fi-tr-folder-open"></i></span>
                    Meus Cálculos
                </a>
                <a href="#">
                    <span class="nav-icon"><i class="fi fi-tr-file-spreadsheet"></i></span>
                    Relatórios
                </a>
                <a class="active" href="#">
                    <span class="nav-icon"><i class="fi fi-rr-time-past"></i></span>
                    Histórico de Emissões
                </a>
                <a href="#">
                    <span class="nav-icon"><i class="fi fi-ts-book-open-cover"></i></span>
                    Metodologia
                </a>
                <a href="#">
                    <span class="nav-icon"><i class="fi fi-tr-carbon-cloud"></i></span>
                    Fatores de Emissão
                </a>
                <a href="#">
                    <span class="nav-icon"><i class="fi fi-rr-interrogation"></i></span>
                    Dúvidas Frequentes
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
                    <div class="toggle-btns">
                        <button class="active">☀️</button>
                        <button>🌙</button>
                    </div>
                </div>
            </div>
        </aside>

        <!-- CONTEÚDO -->
        <main class="content">

            <!-- Cabeçalho + filtros -->
            <div class="historico-header">
                <div>
                    <div class="page-title">
                        <h2>Histórico de Emissões</h2>
                    </div>
                    <p class="page-subtitle" style="padding-left:0; margin-bottom:0;">
                        Acompanhe a evolução das emissões da sua empresa ao longo do tempo.
                    </p>
                </div>
                <div class="historico-filters">
                    <select class="filter-select">
                        <option>Todos os anos</option>
                        <option>2024</option>
                        <option>2023</option>
                        <option>2022</option>
                        <option>2021</option>
                        <option>2020</option>
                    </select>
                    <select class="filter-select">
                        <option>Todas as fontes</option>
                        <option>Energia</option>
                        <option>Transporte</option>
                        <option>Resíduos</option>
                        <option>Viagens de Negócios</option>
                        <option>Compras</option>
                    </select>
                    <button class="btn-exportar">
                        <i class="fi fi-rr-file-export"></i>
                        Exportar gráfico
                        <i class="fi fi-rr-angle-small-down" style="font-size:12px;"></i>
                    </button>
                </div>
            </div>

            <!-- LINHA 1: Line chart + Redução Total -->
            <div class="historico-grid">

                <div class="chart-card">
                    <h3>Evolução das Emissões (tCO₂e/ano)</h3>
                    <div class="chart-wrap">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>

                <div class="side-card">
                    <div class="side-card-label">Redução Total</div>
                    <div class="side-card-period">2019 – 2024</div>
                    <div class="side-card-value">-27,1%</div>
                    <div class="side-card-desc">
                        Redução de 19,7 tCO₂e<br>no período analisado.
                    </div>
                    <div class="side-card-leaf">
                        <i class="fi fi-tr-leaf-fall"></i>
                    </div>
                </div>

            </div>

            <!-- LINHA 2: Bar chart + Resumo do Período -->
            <div class="historico-grid-bottom">

                <div class="chart-card">
                    <h3>Emissões por Fonte ao Longo do Tempo (tCO₂e/ano)</h3>
                    <div class="chart-wrap" style="height:220px;">
                        <canvas id="barChart"></canvas>
                    </div>
                    <div class="bar-legend">
                        <div class="bar-legend-item">
                            <div class="bar-legend-dot" style="background:#2e7d32;"></div>
                            Energia
                        </div>
                        <div class="bar-legend-item">
                            <div class="bar-legend-dot" style="background:#1d4ed8;"></div>
                            Transporte
                        </div>
                        <div class="bar-legend-item">
                            <div class="bar-legend-dot" style="background:#d97706;"></div>
                            Resíduos
                        </div>
                        <div class="bar-legend-item">
                            <div class="bar-legend-dot" style="background:#7c3aed;"></div>
                            Viagens de Negócios
                        </div>
                        <div class="bar-legend-item">
                            <div class="bar-legend-dot" style="background:#0891b2;"></div>
                            Compras
                        </div>
                    </div>
                </div>

                <div class="resumo-card">
                    <h3>Resumo do Período</h3>

                    <div class="resumo-item">
                        <div class="resumo-icon">
                            <i class="fi fi-sr-arrow-trend-up"></i>
                        </div>
                        <div>
                            <div class="resumo-item-label">Maior emissão</div>
                            <div class="resumo-item-value">
                                72,5 <span class="unit">tCO₂e (2020)</span>
                            </div>
                        </div>
                    </div>

                    <div class="resumo-item">
                        <div class="resumo-icon">
                            <i class="fi fi-tr-leaf-fall"></i>
                        </div>
                        <div>
                            <div class="resumo-item-label">Menor emissão</div>
                            <div class="resumo-item-value">
                                52,8 <span class="unit">tCO₂e (2024)</span>
                            </div>
                        </div>
                    </div>

                    <div class="resumo-item">
                        <div class="resumo-icon">
                            <i class="fi fi-rr-chart-histogram"></i>
                        </div>
                        <div>
                            <div class="resumo-item-label">Média do período</div>
                            <div class="resumo-item-value">
                                63,0 <span class="unit">tCO₂e</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </main>
    </div>

    <script>
        const anos = ['2020', '2021', '2022', '2023', '2024'];

        /* ── LINE CHART ── */
        new Chart(document.getElementById('lineChart'), {
            type: 'line',
            data: {
                labels: anos,
                datasets: [{
                    label: 'tCO₂e/ano',
                    data: [72.5, 68.1, 61.3, 60.3, 52.8],
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
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: { label: ctx => ` ${ctx.parsed.y} tCO₂e/ano` }
                    }
                },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { font: { size: 12 }, color: '#9ca3af' }
                    },
                    y: {
                        min: 20, max: 100,
                        grid: { color: '#f3f4f6' },
                        ticks: { stepSize: 20, font: { size: 11 }, color: '#9ca3af' }
                    }
                }
            }
        });

        /* ── STACKED BAR CHART ── */
        new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: anos,
                datasets: [
                    {
                        label: 'Energia',
                        data: [29.0, 27.2, 24.5, 24.1, 21.1],
                        backgroundColor: '#2e7d32',
                        borderRadius: 0
                    },
                    {
                        label: 'Transporte',
                        data: [25.4, 23.8, 21.3, 20.8, 18.5],
                        backgroundColor: '#1d4ed8',
                        borderRadius: 0
                    },
                    {
                        label: 'Resíduos',
                        data: [10.8, 10.2,  9.1,  8.9,  7.9],
                        backgroundColor: '#d97706',
                        borderRadius: 0
                    },
                    {
                        label: 'Viagens de Negócios',
                        data: [7.3,  6.9,  6.4,  6.5,  5.3],
                        backgroundColor: '#7c3aed',
                        borderRadius: 0
                    },
                    {
                        label: 'Compras',
                        data: [0.0,  0.0,  0.0,  0.0,  0.0],
                        backgroundColor: '#0891b2',
                        borderRadius: { topLeft: 6, topRight: 6 }
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: { label: ctx => ` ${ctx.dataset.label}: ${ctx.parsed.y} tCO₂e` }
                    }
                },
                scales: {
                    x: {
                        stacked: true,
                        grid: { display: false },
                        ticks: { font: { size: 12 }, color: '#9ca3af' }
                    },
                    y: {
                        stacked: true,
                        min: 0, max: 100,
                        grid: { color: '#f3f4f6' },
                        ticks: { stepSize: 20, font: { size: 11 }, color: '#9ca3af' }
                    }
                }
            }
        });
    </script>

</body>
</html>