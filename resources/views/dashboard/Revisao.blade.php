<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revisão - EcoCarbon</title>

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

            <div class="wizard-step active">
                <div class="circle">3</div>
                <span>Revisão</span>
            </div>

            <div class="line"></div>

            <div class="wizard-step">
                <div class="circle">4</div>
                <span>Resultados</span>
            </div>

        </div>

        <div class="user-area">
            <a href="#">&#9432; Ajuda</a>
            <a href="#" style="border:none; padding:0;"><i class="fi fi-rr-bell" style="font-size:18px;color:#6b7280;"></i></a>
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
                <a class="active" href="#">
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

            <div class="page-title">
                <h2>Revisão dos Dados</h2>
            </div>
            <p class="page-subtitle" style="padding-left:0;">Revise as informações antes de finalizar o cálculo.</p>

            <!-- CARD: Dados da Empresa -->
            <div class="review-card">

                <div class="review-card-header">
                    <h3>Dados da Empresa</h3>
                    <button class="btn-edit">
                        <i class="fi fi-rr-pencil"></i> Editar
                    </button>
                </div>

                <div class="review-data-grid">

                    <div class="review-data-item">
                        <label>Nome da Empresa</label>
                        <span>Alpha Tecnologia</span>
                    </div>

                    <div class="review-data-item">
                        <label>Cidade / Estado</label>
                        <span>São Paulo / SP</span>
                    </div>

                    <div class="review-data-item">
                        <label>CNPJ</label>
                        <span>12.345.678/0001-90</span>
                    </div>

                    <div class="review-data-item">
                        <label>Ano de Referência</label>
                        <span>2024</span>
                    </div>

                    <div class="review-data-item">
                        <label>Setor de Atuação</label>
                        <span>Tecnologia da Informação</span>
                    </div>

                    <div class="review-data-item">
                        <label>Responsável</label>
                        <span>João da Silva</span>
                    </div>

                    <div class="review-data-item">
                        <label>Número de Funcionários</label>
                        <span>150</span>
                    </div>

                    <div class="review-data-item">
                        <label>E-mail</label>
                        <span>joao.silva@alphatec.com.br</span>
                    </div>

                </div>

            </div>

            <!-- CARD: Fontes de Emissão -->
            <div class="review-card">

                <div class="review-card-header">
                    <h3>Fontes de Emissão</h3>
                    <button class="btn-edit">
                        <i class="fi fi-rr-pencil"></i> Editar
                    </button>
                </div>

                <table class="review-table">
                    <thead>
                        <tr>
                            <th>Fonte</th>
                            <th>Descrição</th>
                            <th>Dado informado</th>
                            <th>Emissão (tCO₂e)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Energia</td>
                            <td>Rede elétrica</td>
                            <td>125.000 kWh</td>
                            <td>21,1</td>
                        </tr>
                        <tr>
                            <td>Transporte</td>
                            <td>Diesel</td>
                            <td>85.600 km</td>
                            <td>18,5</td>
                        </tr>
                        <tr>
                            <td>Resíduos</td>
                            <td>Aterro sanitário</td>
                            <td>12.500 kg</td>
                            <td>7,9</td>
                        </tr>
                        <tr>
                            <td>Viagens de Negócios</td>
                            <td>Aéreo</td>
                            <td>32.400 km</td>
                            <td>5,3</td>
                        </tr>
                        <tr>
                            <td>Compras</td>
                            <td>Materiais de escritório</td>
                            <td>R$ 850.000,00</td>
                            <td class="zero-value">0,0</td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </main>

    </div>

    <!-- BARRA INFERIOR -->
    <div class="bottom-bar bottom-bar--dual">
        <button class="back-btn">Voltar</button>
        <a href="{{ route('calculo.resultados') }}" class="next-btn">
    Ver Resultados →
</a>
    </div>

</body>

</html>