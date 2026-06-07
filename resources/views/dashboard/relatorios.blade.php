<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios - EcoCarbon</title>

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

        <!-- Sem wizard nesta tela — área central vazia -->
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
                <a class="active" href="#">
                    <span class="nav-icon"><i class="fi fi-tr-file-spreadsheet"></i></span>
                    Relatórios
                </a>
                <a href="#">
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

            <!-- Cabeçalho da página -->
            <div class="page-header-row">
                <div>
                    <div class="page-title">
                        <h2>Relatórios</h2>
                    </div>
                    <p class="page-subtitle" style="padding-left:0;">Acesse e gere relatórios dos seus cálculos.</p>
                </div>
                <a href="#" class="btn-novo-relatorio">
                    <i class="fi fi-rr-download"></i>
                    Novo Relatório
                </a>
            </div>

            <!-- STAT CARDS -->
            <div class="stat-cards-row">

                <div class="stat-card">
                    <div class="stat-card-value green">12</div>
                    <div class="stat-card-label">Relatórios Gerados<br>Este ano</div>
                </div>

                <div class="stat-card">
                    <div class="stat-card-value green">8</div>
                    <div class="stat-card-label">Cálculos Realizados<br>Este ano</div>
                </div>

                <div class="stat-card">
                    <div class="stat-card-value red">-12,4%</div>
                    <div class="stat-card-label">Redução média<br>das emissões</div>
                </div>

                <div class="stat-card">
                    <div class="stat-card-value" style="font-size:28px;">
                        52,<span style="font-size:18px; font-weight:700;">8</span>
                    </div>
                    <div class="stat-card-label">tCO₂e/ano<br>Média das emissões</div>
                </div>

            </div>

            <!-- TABELA DE RELATÓRIOS -->
            <div class="table-card">

                <div class="table-card-header">
                    <h3>Relatórios Gerados</h3>
                </div>

                <table class="relatorios-table">
                    <thead>
                        <tr>
                            <th>Nome do Relatório</th>
                            <th>Empresa</th>
                            <th>Período</th>
                            <th>Emissão Total</th>
                            <th>Data de Geração</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="nome-col">Relatório 2024</td>
                            <td>Alpha Tecnologia</td>
                            <td>Jan a Dez/2024</td>
                            <td class="td-emission">52,8 tCO₂e</td>
                            <td>15/05/2024</td>
                            <td>
                                <div class="table-actions">
                                    <a href="#" class="btn-table-icon" title="Baixar">
                                        <i class="fi fi-rr-download"></i>
                                    </a>
                                    <a href="#" class="btn-table-icon" title="Mais opções">
                                        <i class="fi fi-rr-menu-dots-vertical"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="nome-col">Relatório 1º Sem/2024</td>
                            <td>Alpha Tecnologia</td>
                            <td>Jan a Jun/2024</td>
                            <td class="td-emission">28,1 tCO₂e</td>
                            <td>10/01/2024</td>
                            <td>
                                <div class="table-actions">
                                    <a href="#" class="btn-table-icon" title="Baixar">
                                        <i class="fi fi-rr-download"></i>
                                    </a>
                                    <a href="#" class="btn-table-icon" title="Mais opções">
                                        <i class="fi fi-rr-menu-dots-vertical"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="nome-col">Relatório 2023</td>
                            <td>Alpha Tecnologia</td>
                            <td>Jan a Dez/2023</td>
                            <td class="td-emission">60,3 tCO₂e</td>
                            <td>12/01/2024</td>
                            <td>
                                <div class="table-actions">
                                    <a href="#" class="btn-table-icon" title="Baixar">
                                        <i class="fi fi-rr-download"></i>
                                    </a>
                                    <a href="#" class="btn-table-icon" title="Mais opções">
                                        <i class="fi fi-rr-menu-dots-vertical"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="nome-col">Relatório 2º Sem/2023</td>
                            <td>Alpha Tecnologia</td>
                            <td>Jul a Dez/2023</td>
                            <td class="td-emission">32,2 tCO₂e</td>
                            <td>15/01/2024</td>
                            <td>
                                <div class="table-actions">
                                    <a href="#" class="btn-table-icon" title="Baixar">
                                        <i class="fi fi-rr-download"></i>
                                    </a>
                                    <a href="#" class="btn-table-icon" title="Mais opções">
                                        <i class="fi fi-rr-menu-dots-vertical"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="nome-col">Relatório 2022</td>
                            <td>Alpha Tecnologia</td>
                            <td>Jan a Dez/2022</td>
                            <td class="td-emission">61,3 tCO₂e</td>
                            <td>10/01/2023</td>
                            <td>
                                <div class="table-actions">
                                    <a href="#" class="btn-table-icon" title="Baixar">
                                        <i class="fi fi-rr-download"></i>
                                    </a>
                                    <a href="#" class="btn-table-icon" title="Mais opções">
                                        <i class="fi fi-rr-menu-dots-vertical"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>

                <!-- PAGINAÇÃO -->
                <div class="pagination-wrap">
                    <a href="#" class="page-btn arrow">
                        <i class="fi fi-rr-angle-left" style="font-size:12px;"></i>
                    </a>
                    <a href="#" class="page-btn active">1</a>
                    <a href="#" class="page-btn">2</a>
                    <a href="#" class="page-btn">3</a>
                    <a href="#" class="page-btn arrow">
                        <i class="fi fi-rr-angle-right" style="font-size:12px;"></i>
                    </a>
                </div>

            </div>

        </main>

    </div>

</body>

</html>