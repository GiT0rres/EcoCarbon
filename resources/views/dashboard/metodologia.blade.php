<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metodologia - EcoCarbon</title>

    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-regular-chubby/css/uicons-regular-chubby.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-solid-straight/css/uicons-solid-straight.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-regular-straight/css/uicons-regular-straight.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-thin-rounded/css/uicons-thin-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-thin-straight/css/uicons-thin-straight.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">


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
                <a href="#">
                    <span class="nav-icon"><i class="fi fi-rr-time-past"></i></span>
                    Histórico de Emissões
                </a>
                <a class="active" href="#">
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

            <!-- Cabeçalho -->
            <div class="page-title">
                <h2>Metodologia</h2>
            </div>
            <p class="page-subtitle" style="padding-left:0;">
                Conheça os padrões e métodos utilizados em nossos cálculos.
            </p>

            <!-- TABS -->
            <div class="metodo-tabs">
                <button class="tab-btn active">Visão Geral</button>
                <button class="tab-btn">Padrões Utilizados</button>
                <button class="tab-btn">Fatores de Emissão</button>
                <button class="tab-btn">Escopos</button>
            </div>

            <!-- LINHA 1: Nossa Metodologia + Escopos de Emissão -->
            <div class="metodo-grid">

                <!-- Nossa Metodologia -->
                <div class="metodo-card">
                    <h3>Nossa Metodologia</h3>
                    <p>A EcoCarbon utiliza metodologias reconhecidas internacionalmente para calcular a pegada de carbono corporativa, garantindo precisão, transparência e confiabilidade nos resultados.</p>

                    <div class="check-list">
                        <div class="check-item">
                            <i class="fi fi-sr-check-circle"></i>
                            Cálculo baseado no GHG Protocol
                        </div>
                        <div class="check-item">
                            <i class="fi fi-sr-check-circle"></i>
                            Fatores de emissão atualizados regularmente
                        </div>
                        <div class="check-item">
                            <i class="fi fi-sr-check-circle"></i>
                            Abrangência dos Escopos 1, 2 e 3
                        </div>
                        <div class="check-item">
                            <i class="fi fi-sr-check-circle"></i>
                            Alinhado aos padrões ISO 14064
                        </div>
                        <div class="check-item">
                            <i class="fi fi-sr-check-circle"></i>
                            Relatórios claros e auditáveis
                        </div>
                    </div>
                </div>

                <!-- Escopos de Emissão -->
                <div class="escopos-card">
                    <h3>Escopos de Emissão</h3>

                    <div class="escopos-diagram">

                        <!-- Escopo 2 -->
                        <div class="escopo-col">
                            <div class="escopo-circle light">
                                <span class="escopo-num">Escopo 2</span>
                                <span class="escopo-tipo">Indireto</span>
                                <span class="escopo-desc">Energia elétrica comprada</span>
                            </div>
                            <div class="escopo-icons">
                                <i class="fi fi-rr-plug"></i>
                            </div>
                        </div>

                        <div class="escopo-arrow">
                            <i class="fi fi-rr-arrow-right"></i>
                        </div>

                        <!-- Escopo 1 (centro, destaque) -->
                        <div class="escopo-col">
                            <div class="escopo-circle dark">
                                <span class="escopo-num">Escopo 1</span>
                                <span class="escopo-tipo">Direto</span>
                                <span class="escopo-desc">Fontes que pertencem ou são controladas pela empresa</span>
                            </div>
                            <div class="escopo-icons">
                                <i class="fi fi-rr-industry-alt"></i>
                            </div>
                        </div>

                        <div class="escopo-arrow">
                            <i class="fi fi-rr-arrow-right"></i>
                        </div>

                        <!-- Escopo 3 -->
                        <div class="escopo-col">
                            <div class="escopo-circle light">
                                <span class="escopo-num">Escopo 3</span>
                                <span class="escopo-tipo">Indireto</span>
                                <span class="escopo-desc">Outras emissões da cadeia de valor</span>
                            </div>
                            <div class="escopo-icons">
                                <i class="fi fi-ss-plane-alt"></i>
                                <i class="fi fi-ss-truck-side"></i>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- LINHA 2: Padrões e Referências (full width) -->
            <div class="padroes-card">
                <h3>Padrões e Referências</h3>
                <div class="padroes-grid">

                    <div class="padrao-item">
                        <div class="padrao-logo" style="border-color:#2e7d32; font-size:11px;">GHG</div>
                        <div>
                            <div class="padrao-name">GHG Protocol</div>
                            <div class="padrao-desc">Corporate Standard</div>
                        </div>
                    </div>

                    <div class="padrao-item">
                        <div class="padrao-logo" style="border-color:#1d4ed8; color:#1d4ed8; background:#eff6ff; font-size:12px; font-weight:900; letter-spacing:-1px;">ISO</div>
                        <div>
                            <div class="padrao-name">ISO 14064</div>
                            <div class="padrao-desc">Série de normas</div>
                        </div>
                    </div>

                    <div class="padrao-item">
                        <div class="padrao-logo" style="border-color:#0891b2; color:#0891b2; background:#ecfeff; font-size:11px;">IPCC</div>
                        <div>
                            <div class="padrao-name">IPCC</div>
                            <div class="padrao-desc">Painel Intergovernamental sobre Mudanças Climáticas</div>
                        </div>
                    </div>

                    <div class="padrao-item">
                        <div class="padrao-logo" style="border-color:#d97706; color:#d97706; background:#fffbeb; font-size:11px;">ABNT</div>
                        <div>
                            <div class="padrao-name">ABNT</div>
                            <div class="padrao-desc">Associação Brasileira de Normas Técnicas</div>
                        </div>
                    </div>

                </div>
            </div>

        </main>
    </div>

    <script>
        /* Tabs simples sem dependência externa */
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
            });
        });
    </script>

</body>
</html>