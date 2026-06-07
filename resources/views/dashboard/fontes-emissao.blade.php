<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fontes de Emissão - EcoCarbon</title>

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

            <div class="wizard-step active">
                <div class="circle">2</div>
                <span>Fontes de Emissão</span>
            </div>

            <div class="line"></div>

            <div class="wizard-step">
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

            <!-- Cabeçalho + botão importar -->
            <div class="page-header-row">
                <div>
                    <div class="page-title">
                        <h2>Fontes de Emissão</h2>
                    </div>
                    <p class="page-subtitle">Informe os dados de cada fonte de emissão da sua empresa.</p>
                </div>
                <button class="btn-import">
                    <i class="fi fi-rr-file-spreadsheet"></i>
                    Importar dados de planilha
                </button>
            </div>

            <!-- ENERGIA -->
            <div class="emission-card">
                <div class="emission-source-info">
                    <div class="emission-icon-wrap energy">
                        <i class="fi fi-sr-bolt"></i>
                    </div>
                    <div>
                        <h4>Energia</h4>
                        <p>Consumo de energia elétrica, vapor, calor ou refrigeração.</p>
                    </div>
                </div>
                <div class="emission-field">
                    <label>Consumo total (kWh)</label>
                    <input type="number" placeholder="Ex: 125.000" value="125000">
                </div>
                <div class="emission-field">
                    <label>Fonte de energia</label>
                    <select>
                        <option selected>Rede elétrica</option>
                        <option>Solar fotovoltaica</option>
                        <option>Biomassa</option>
                        <option>Gás natural</option>
                    </select>
                </div>
                <div class="emission-result">
                    <label>Emissão (tCO₂e)</label>
                    <div class="value">21,1</div>
                </div>
            </div>

            <!-- TRANSPORTE -->
            <div class="emission-card">
                <div class="emission-source-info">
                    <div class="emission-icon-wrap transport">
                        <i class="fi fi-ss-truck-side"></i>
                    </div>
                    <div>
                        <h4>Transporte</h4>
                        <p>Frota própria, transporte terceirizado e deslocamento de colaboradores.</p>
                    </div>
                </div>
                <div class="emission-field">
                    <label>Quilometragem total (km)</label>
                    <input type="number" placeholder="Ex: 85.600" value="85600">
                </div>
                <div class="emission-field">
                    <label>Tipo de combustível</label>
                    <select>
                        <option selected>Diesel</option>
                        <option>Gasolina</option>
                        <option>Etanol</option>
                        <option>GNV</option>
                        <option>Elétrico</option>
                    </select>
                </div>
                <div class="emission-result">
                    <label>Emissão (tCO₂e)</label>
                    <div class="value">18,5</div>
                </div>
            </div>

            <!-- RESÍDUOS -->
            <div class="emission-card">
                <div class="emission-source-info">
                    <div class="emission-icon-wrap waste">
                        <i class="fi fi-sr-trash-can-check"></i>
                    </div>
                    <div>
                        <h4>Resíduos</h4>
                        <p>Resíduos sólidos, efluentes e tratamento de resíduos.</p>
                    </div>
                </div>
                <div class="emission-field">
                    <label>Resíduos gerados (kg)</label>
                    <input type="number" placeholder="Ex: 12.500" value="12500">
                </div>
                <div class="emission-field">
                    <label>Destino principal</label>
                    <select>
                        <option selected>Aterro sanitário</option>
                        <option>Reciclagem</option>
                        <option>Compostagem</option>
                        <option>Incineração</option>
                    </select>
                </div>
                <div class="emission-result">
                    <label>Emissão (tCO₂e)</label>
                    <div class="value">7,9</div>
                </div>
            </div>

            <!-- VIAGENS DE NEGÓCIOS -->
            <div class="emission-card">
                <div class="emission-source-info">
                    <div class="emission-icon-wrap travel">
                        <i class="fi fi-ss-plane-alt"></i>
                    </div>
                    <div>
                        <h4>Viagens de Negócios</h4>
                        <p>Viagens aéreas, rodoviárias e hospedagens de negócios.</p>
                    </div>
                </div>
                <div class="emission-field">
                    <label>Distância total (km)</label>
                    <input type="number" placeholder="Ex: 32.400" value="32400">
                </div>
                <div class="emission-field">
                    <label>Meio de transporte</label>
                    <select>
                        <option selected>Aéreo</option>
                        <option>Rodoviário</option>
                        <option>Ferroviário</option>
                    </select>
                </div>
                <div class="emission-result">
                    <label>Emissão (tCO₂e)</label>
                    <div class="value">5,3</div>
                </div>
            </div>

            <!-- COMPRAS -->
            <div class="emission-card">
                <div class="emission-source-info">
                    <div class="emission-icon-wrap shopping">
                        <i class="fi fi-ss-shopping-cart"></i>
                    </div>
                    <div>
                        <h4>Compras</h4>
                        <p>Bens e serviços adquiridos pela empresa.</p>
                    </div>
                </div>
                <div class="emission-field">
                    <label>Valor anual (R$)</label>
                    <input type="number" placeholder="Ex: 850.000" value="850000">
                </div>
                <div class="emission-field">
                    <label>Categoria principal</label>
                    <select>
                        <option selected>Materiais de escritório</option>
                        <option>Equipamentos de TI</option>
                        <option>Serviços terceirizados</option>
                        <option>Alimentação</option>
                    </select>
                </div>
                <div class="emission-result">
                    <label>Emissão (tCO₂e)</label>
                    <div class="value zero">0,0</div>
                </div>
            </div>

        </main>

    </div>

   <!-- BARRA INFERIOR -->
<div class="bottom-bar">
    <a href="{{ route('calculo.revisao') }}" class="next-btn">
    Próximo: Revisão →
</a>
</div>

</body>

</html>