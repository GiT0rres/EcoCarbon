<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Cálculo - EcoCarbon</title><link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css">
<link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-regular-chubby/css/uicons-regular-chubby.css">
<link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css">
<link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-solid-straight/css/uicons-solid-straight.css">    
<link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-solid-straight/css/uicons-solid-straight.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-regular-straight/css/uicons-regular-straight.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-thin-rounded/css/uicons-thin-rounded.css">
<link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-thin-straight/css/uicons-thin-straight.css">
<link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>
<header class="topbar">

    <!-- LOGO -->
    <div class="logo-area">

        <a class="navbar-brand" href="/">
            <img
                src="{{ asset('img/LogoEcoCarbon.png') }}"
                alt="EcoCarbon"
                class="logo-ecocarbon">
        </a>

    </div>

    <!-- ETAPAS -->
    <div class="wizard">

        <div class="wizard-step active">
            <div class="circle">1</div>
            <span>Dados da Empresa</span>
        </div>

        <div class="line"></div>

        <div class="wizard-step">
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

    <!-- USUÁRIO -->
    <div class="user-area">

        <a href="#">
            &#9432; Ajuda
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
    <span class="nav-icon">
        <i class="fi fi-rr-home"></i>
    </span>
    Início
</a>
    
<a href="#">
    <span class="nav-icon">
        <i class="fi fi-ts-clipboard"></i>
    </span>
    Novo Cálculo
</a>
      <a href="#">
    <span class="nav-icon">
       <i class="fi fi-tr-folder-open"></i>
    </span>
    Meus Cálculos
</a>
             
     <a href="#">
    <span class="nav-icon">
<i class="fi fi-tr-file-spreadsheet"></i>
    </span>
    Relatórios
</a>
                
     <a href="#">
    <span class="nav-icon">
       <i class="fi fi-rr-time-past"></i>
    </span>
    Histórico de Emissões
</a>
                
       <a href="#">
    <span class="nav-icon">
       <i class="fi fi-ts-book-open-cover"></i>
    </span>
    Metodologia
</a>
                
       <a href="#">
    <span class="nav-icon">
        <i class="fi fi-tr-carbon-cloud"></i>
    </span>
    Fatores de Emissão
</a>
               
      <a href="#">
    <span class="nav-icon">
      <i class="fi fi-rr-interrogation"></i>
    </span>
    Dúvidas frequentes
</a>

            <div>
                <div class="sidebar-help">
                   <span class="leaf-icon">
                 <i class="fi fi-tr-leaf-fall"></i>
                    </span>
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
                <span class="leaf-icon">🌿</span>
                <h2>Novo Cálculo</h2>
            </div>
            <p class="page-subtitle">Preencha os dados da sua empresa para começar o cálculo da pegada de carbono.</p>

            <!-- Aviso -->
            <div class="alert-info">
                <span class="alert-icon"><i class="fi fi-ss-octagon-exclamation"></i></span>
                <div>
                    <strong>Importante</strong>
                    Os dados informados serão utilizados exclusivamente para cálculo da pegada de carbono da sua empresa.
                </div>
            </div>

            <!-- Card: Dados da Empresa -->
            <div class="card-form">

                <div class="card-header">
                    <div class="card-header-icon"><span><i class="fi fi-rr-building"></i></span></div>
                    <div>
                        <h3>Dados da Empresa</h3>
                        <p>Informações gerais sobre a sua organização.</p>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="field">
                        <label>Nome da Empresa <span class="required">*</span></label>
                        <input type="text" placeholder="Ex: Alpha Tecnologia">
                    </div>
                    <div class="field">
                        <label>CNPJ <span class="required">*</span></label>
                        <input type="text" placeholder="Ex: 12.345.678/0001-90">
                    </div>
                    <div class="field">
                        <label>Setor de Atuação <span class="required">*</span></label>
                        <select>
                            <option>Tecnologia da Informação</option>
                            <option>Indústria</option>
                            <option>Agronegócio</option>
                            <option>Varejo</option>
                            <option>Serviços</option>
                        </select>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="field">
                        <label>Número de Funcionários <span class="required">*</span></label>
                        <input type="number" placeholder="Ex: 150">
                    </div>
                    <div class="field">
                        <label>Cidade <span class="required">*</span></label>
                        <input type="text" placeholder="Ex: São Paulo">
                    </div>
                    <div class="field">
                        <label>Estado <span class="required">*</span></label>
                        <select>
                            <option>São Paulo</option>
                            <option>Rio de Janeiro</option>
                            <option>Minas Gerais</option>
                            <option>Bahia</option>
                            <option>Paraná</option>
                        </select>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="field">
                        <label>Ano de Referência <span class="required">*</span></label>
                        <select>
                            <option>2024</option>
                            <option>2023</option>
                            <option>2022</option>
                        </select>
                    </div>
                    <div class="field">
                        <label>Responsável pelo Preenchimento <span class="required">*</span></label>
                        <input type="text" placeholder="Ex: João da Silva">
                    </div>
                    <div class="field">
                        <label>E-mail do Responsável <span class="required">*</span></label>
                        <input type="email" placeholder="Ex: joao.silva@alphatec.com.br">
                    </div>
                </div>

                <div class="tip-box">
                    <span class="tip-icon"><i class="fi fi-rc-thumbs-up"></i></span>
                    <span><strong>Dica:</strong> Reúna os dados de consumo de energia, combustível, viagens e resíduos do ano selecionado para um cálculo mais preciso.</span>
                </div>

            </div>

            <!-- Fontes de Emissão -->
            <div class="card-form">
                <p class="section-title">Fontes de Emissão que você irá informar</p>
                <p class="section-sub">Na próxima etapa, você informará os dados das seguintes fontes:</p>

                <div class="sources-grid">
                    <div class="source-card">
                        <span class="source-icon"><i class="fi fi-sr-bolt"></i></span>
                        <h4>Energia</h4>
                        <p>Consumo de energia elétrica, vapor, calor ou refrigeração.</p>
                    </div>
                    <div class="source-card highlight">
                        <span class="source-icon"><i class="fi fi-ss-truck-side"></i></span>
                        <h4>Transporte</h4>
                        <p>Frota própria, transporte terceirizado e deslocamento de colaboradores.</p>
                    </div>
                    <div class="source-card">
                        <span class="source-icon"><i class="fi fi-ss-plane-alt"></i></span>
                        <h4>Viagens</h4>
                        <p>Viagens aéreas, rodoviárias e hospedagens de negócios.</p>
                    </div>
                    <div class="source-card">
                        <span class="source-icon"><i class="fi fi-sr-trash-can-check"></i></span>
                        <h4>Resíduos</h4>
                        <p>Resíduos sólidos, efluentes e tratamento de resíduos.</p>
                    </div>
                    <div class="source-card">
                        <span class="source-icon"><i class="fi fi-ss-shopping-cart"></i></span>
                        <h4>Compras</h4>
                        <p>Bens e serviços adquiridos pela empresa.</p>
                    </div>
                </div>
            </div>

        </main>

    </div>

    <div class="bottom-bar">
    <a href="{{ route('calculo.fontes') }}" class="next-btn">
        Próximo: Fontes de Emissão →
    </a>
</div>

</body>

</html>