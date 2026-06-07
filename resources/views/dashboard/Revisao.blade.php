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

<header class="topbar">
    <div class="logo-area">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('img/LogoEcoCarbon.png') }}" alt="EcoCarbon" class="logo-ecocarbon">
        </a>
    </div>

    <div class="wizard">
        <div class="wizard-step done">
            <div class="circle">✓</div><span>Dados da Empresa</span>
        </div>
        <div class="line"></div>
        <div class="wizard-step done">
            <div class="circle">✓</div><span>Fontes de Emissão</span>
        </div>
        <div class="line"></div>
        <div class="wizard-step active">
            <div class="circle">3</div><span>Revisão</span>
        </div>
        <div class="line"></div>
        <div class="wizard-step">
            <div class="circle">4</div><span>Resultados</span>
        </div>
    </div>

    <div class="user-area">
        <a href="#">&#9432; Ajuda</a>
        <a href="#" style="border:none; padding:0;"><i class="fi fi-rr-bell" style="font-size:18px;color:#6b7280;"></i></a>
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
                <div class="toggle-btns">
                    <button class="active">☀️</button>
                    <button>🌙</button>
                </div>
            </div>
        </div>
    </aside>

    <main class="content">

        <div class="page-title">
            <h2>Revisão dos Dados</h2>
        </div>
        <p class="page-subtitle" style="padding-left:0;">Revise as informações antes de finalizar o cálculo.</p>

        {{-- Dados da Empresa --}}
        <div class="review-card">
            <div class="review-card-header">
                <h3>Dados da Empresa</h3>
                <a href="{{ route('calculo.novo') }}" class="btn-edit">
                    <i class="fi fi-rr-pencil"></i> Editar
                </a>
            </div>
            <div class="review-data-grid">
                <div class="review-data-item">
                    <label>Nome da Empresa</label>
                    <span>{{ $calculo->empresa }}</span>
                </div>
                <div class="review-data-item">
                    <label>Cidade / Estado</label>
                    <span>{{ $calculo->cidade }} / {{ $calculo->estado }}</span>
                </div>
                <div class="review-data-item">
                    <label>CNPJ</label>
                    <span>{{ $calculo->cnpj }}</span>
                </div>
                <div class="review-data-item">
                    <label>Ano de Referência</label>
                    <span>{{ $calculo->ano_referencia }}</span>
                </div>
                <div class="review-data-item">
                    <label>Setor de Atuação</label>
                    <span>{{ $calculo->setor }}</span>
                </div>
                <div class="review-data-item">
                    <label>Responsável</label>
                    <span>{{ $calculo->responsavel }}</span>
                </div>
                <div class="review-data-item">
                    <label>Número de Funcionários</label>
                    <span>{{ number_format($calculo->funcionarios, 0, ',', '.') }}</span>
                </div>
                <div class="review-data-item">
                    <label>E-mail</label>
                    <span>{{ $calculo->email_responsavel }}</span>
                </div>
            </div>
        </div>

        {{-- Fontes de Emissão --}}
        @php $f = $calculo->fonteEmissao ?? null; @endphp
        <div class="review-card">
            <div class="review-card-header">
                <h3>Fontes de Emissão</h3>
                <a href="{{ route('calculo.fontes') }}" class="btn-edit">
                    <i class="fi fi-rr-pencil"></i> Editar
                </a>
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
                    @if($f)
                    <tr>
                        <td>Energia</td>
                        <td>{{ str_replace('_', ' ', ucfirst($f->energia_fonte)) }}</td>
                        <td>{{ number_format($f->energia_consumo_kwh, 0, ',', '.') }} kWh</td>
                        <td>{{ number_format($f->energia_emissao_tco2e, 1, ',', '.') }}</td>
                    </tr>

                    <tr>
                        <td>Transporte</td>
                        <td>{{ ucfirst($f->transporte_combustivel) }}</td>
                        <td>{{ number_format($f->transporte_km, 0, ',', '.') }} km</td>
                        <td>{{ number_format($f->transporte_emissao_tco2e, 1, ',', '.') }}</td>
                    </tr>

                    <tr>
                        <td>Resíduos</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $f->residuos_destino)) }}</td>
                        <td>{{ number_format($f->residuos_kg, 0, ',', '.') }} kg</td>
                        <td>{{ number_format($f->residuos_emissao_tco2e, 1, ',', '.') }}</td>
                    </tr>

                    <tr>
                        <td>Viagens</td>
                        <td>{{ ucfirst($f->viagens_meio) }}</td>
                        <td>{{ number_format($f->viagens_km, 0, ',', '.') }} km</td>
                        <td>{{ number_format($f->viagens_emissao_tco2e, 1, ',', '.') }}</td>
                    </tr>

                    <tr>
                        <td>Compras</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $f->compras_categoria)) }}</td>
                        <td>R$ {{ number_format($f->compras_valor_reais, 2, ',', '.') }}</td>
                        <td>{{ number_format($f->compras_emissao_tco2e, 1, ',', '.') }}</td>
                    </tr>
                @else
                    <tr>
                        <td colspan="4" style="text-align:center;">
                            Nenhuma fonte de emissão cadastrada ainda.
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>

        <form action="{{ route('calculo.revisao.post') }}" method="POST">
            @csrf
            <div class="bottom-bar bottom-bar--dual">
                <a href="{{ route('calculo.fontes') }}" class="back-btn">Voltar</a>
                <button type="submit" class="next-btn">Ver Resultados →</button>
            </div>
        </form>

    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>