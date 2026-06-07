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

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="page-header-row">
            <div>
                <div class="page-title">
                    <h2>Fontes de Emissão</h2>
                </div>
                <p class="page-subtitle">Informe os dados de cada fonte de emissão da sua empresa.</p>
            </div>
            <button class="btn-import" type="button">
                <i class="fi fi-rr-file-spreadsheet"></i>
                Importar dados de planilha
            </button>
        </div>

        {{-- ─── Fatores em JSON para o JS calcular em tempo real ─────────── --}}
        <script>
            const FATORES = {
                energia: {
                    rede_eletrica: 0.0001688,
                    solar:         0.0000480,
                    biomassa:      0.0000000,
                    gas_natural:   0.0002020,
                },
                transporte: {
                    diesel:    0.000216,
                    gasolina:  0.000192,
                    etanol:    0.000066,
                    gnv:       0.000137,
                    eletrico:  0.000025,
                },
                residuos: {
                    aterro:      0.000632,
                    reciclagem:  0.000060,
                    compostagem: 0.000130,
                    incineracao: 0.000950,
                },
                viagens: {
                    aereo:       0.000163,
                    rodoviario:  0.000089,
                    ferroviario: 0.000041,
                },
                compras: {
                    escritorio:  0.000000,
                    ti:          0.000085,
                    servicos:    0.000042,
                    alimentacao: 0.000210,
                },
            };

            function calcular(tipo) {
                const card = document.querySelector(`[data-tipo="${tipo}"]`);
                if (!card) return;

                let valor = 0;
                let fator = 0;

                if (tipo === 'energia') {
                    valor = parseFloat(card.querySelector('[name="energia_consumo_kwh"]').value) || 0;
                    const fonte = card.querySelector('[name="energia_fonte"]').value;
                    fator = FATORES.energia[fonte] ?? FATORES.energia.rede_eletrica;
                } else if (tipo === 'transporte') {
                    valor = parseFloat(card.querySelector('[name="transporte_km"]').value) || 0;
                    const comb = card.querySelector('[name="transporte_combustivel"]').value;
                    fator = FATORES.transporte[comb] ?? FATORES.transporte.diesel;
                } else if (tipo === 'residuos') {
                    valor = parseFloat(card.querySelector('[name="residuos_kg"]').value) || 0;
                    const dest = card.querySelector('[name="residuos_destino"]').value;
                    fator = FATORES.residuos[dest] ?? FATORES.residuos.aterro;
                } else if (tipo === 'viagens') {
                    valor = parseFloat(card.querySelector('[name="viagens_km"]').value) || 0;
                    const meio = card.querySelector('[name="viagens_meio"]').value;
                    fator = FATORES.viagens[meio] ?? FATORES.viagens.aereo;
                } else if (tipo === 'compras') {
                    valor = parseFloat(card.querySelector('[name="compras_valor_reais"]').value) || 0;
                    const cat = card.querySelector('[name="compras_categoria"]').value;
                    fator = FATORES.compras[cat] ?? FATORES.compras.escritorio;
                    valor = valor / 1000; // converte R$ para R$ mil
                }

                const emissao = valor * fator;
                const display = card.querySelector('.value');
                display.textContent = emissao.toLocaleString('pt-BR', { minimumFractionDigits: 1, maximumFractionDigits: 1 });
                display.classList.toggle('zero', emissao === 0);
            }

            document.addEventListener('DOMContentLoaded', () => {
                ['energia','transporte','residuos','viagens','compras'].forEach(calcular);
            });
        </script>

        <form action="{{ route('calculo.fontes.post') }}" method="POST">
            @csrf

            {{-- ENERGIA --}}
            <div class="emission-card" data-tipo="energia">
                <div class="emission-source-info">
                    <div class="emission-icon-wrap energy"><i class="fi fi-sr-bolt"></i></div>
                    <div>
                        <h4>Energia</h4>
                        <p>Consumo de energia elétrica, vapor, calor ou refrigeração.</p>
                    </div>
                </div>
                <div class="emission-field">
                    <label>Consumo total (kWh)</label>
                    <input type="number" name="energia_consumo_kwh" placeholder="Ex: 125.000"
                        value="{{ old('energia_consumo_kwh', $fonte->energia_consumo_kwh ?? 0) }}"
                        oninput="calcular('energia')" onchange="calcular('energia')">
                </div>
                <div class="emission-field">
                    <label>Fonte de energia</label>
                    <select name="energia_fonte" onchange="calcular('energia')">
                        <option value="rede_eletrica" {{ ($fonte->energia_fonte ?? 'rede_eletrica') === 'rede_eletrica' ? 'selected' : '' }}>Rede elétrica</option>
                        <option value="solar"         {{ ($fonte->energia_fonte ?? '') === 'solar'         ? 'selected' : '' }}>Solar fotovoltaica</option>
                        <option value="biomassa"      {{ ($fonte->energia_fonte ?? '') === 'biomassa'      ? 'selected' : '' }}>Biomassa</option>
                        <option value="gas_natural"   {{ ($fonte->energia_fonte ?? '') === 'gas_natural'   ? 'selected' : '' }}>Gás natural</option>
                    </select>
                </div>
                <div class="emission-result">
                    <label>Emissão (tCO₂e)</label>
                    <div class="value {{ ($fonte->energia_emissao_tco2e ?? 0) == 0 ? 'zero' : '' }}">
                        {{ number_format($fonte->energia_emissao_tco2e ?? 0, 1, ',', '.') }}
                    </div>
                </div>
            </div>

            {{-- TRANSPORTE --}}
            <div class="emission-card" data-tipo="transporte">
                <div class="emission-source-info">
                    <div class="emission-icon-wrap transport"><i class="fi fi-ss-truck-side"></i></div>
                    <div>
                        <h4>Transporte</h4>
                        <p>Frota própria, transporte terceirizado e deslocamento de colaboradores.</p>
                    </div>
                </div>
                <div class="emission-field">
                    <label>Quilometragem total (km)</label>
                    <input type="number" name="transporte_km" placeholder="Ex: 85.600"
                        value="{{ old('transporte_km', $fonte->transporte_km ?? 0) }}"
                        oninput="calcular('transporte')" onchange="calcular('transporte')">
                </div>
                <div class="emission-field">
                    <label>Tipo de combustível</label>
                    <select name="transporte_combustivel" onchange="calcular('transporte')">
                        <option value="diesel"   {{ ($fonte->transporte_combustivel ?? 'diesel') === 'diesel'   ? 'selected' : '' }}>Diesel</option>
                        <option value="gasolina" {{ ($fonte->transporte_combustivel ?? '') === 'gasolina' ? 'selected' : '' }}>Gasolina</option>
                        <option value="etanol"   {{ ($fonte->transporte_combustivel ?? '') === 'etanol'   ? 'selected' : '' }}>Etanol</option>
                        <option value="gnv"      {{ ($fonte->transporte_combustivel ?? '') === 'gnv'      ? 'selected' : '' }}>GNV</option>
                        <option value="eletrico" {{ ($fonte->transporte_combustivel ?? '') === 'eletrico' ? 'selected' : '' }}>Elétrico</option>
                    </select>
                </div>
                <div class="emission-result">
                    <label>Emissão (tCO₂e)</label>
                    <div class="value {{ ($fonte->transporte_emissao_tco2e ?? 0) == 0 ? 'zero' : '' }}">
                        {{ number_format($fonte->transporte_emissao_tco2e ?? 0, 1, ',', '.') }}
                    </div>
                </div>
            </div>

            {{-- RESÍDUOS --}}
            <div class="emission-card" data-tipo="residuos">
                <div class="emission-source-info">
                    <div class="emission-icon-wrap waste"><i class="fi fi-sr-trash-can-check"></i></div>
                    <div>
                        <h4>Resíduos</h4>
                        <p>Resíduos sólidos, efluentes e tratamento de resíduos.</p>
                    </div>
                </div>
                <div class="emission-field">
                    <label>Resíduos gerados (kg)</label>
                    <input type="number" name="residuos_kg" placeholder="Ex: 12.500"
                        value="{{ old('residuos_kg', $fonte->residuos_kg ?? 0) }}"
                        oninput="calcular('residuos')" onchange="calcular('residuos')">
                </div>
                <div class="emission-field">
                    <label>Destino principal</label>
                    <select name="residuos_destino" onchange="calcular('residuos')">
                        <option value="aterro"      {{ ($fonte->residuos_destino ?? 'aterro') === 'aterro'      ? 'selected' : '' }}>Aterro sanitário</option>
                        <option value="reciclagem"  {{ ($fonte->residuos_destino ?? '') === 'reciclagem'  ? 'selected' : '' }}>Reciclagem</option>
                        <option value="compostagem" {{ ($fonte->residuos_destino ?? '') === 'compostagem' ? 'selected' : '' }}>Compostagem</option>
                        <option value="incineracao" {{ ($fonte->residuos_destino ?? '') === 'incineracao' ? 'selected' : '' }}>Incineração</option>
                    </select>
                </div>
                <div class="emission-result">
                    <label>Emissão (tCO₂e)</label>
                    <div class="value {{ ($fonte->residuos_emissao_tco2e ?? 0) == 0 ? 'zero' : '' }}">
                        {{ number_format($fonte->residuos_emissao_tco2e ?? 0, 1, ',', '.') }}
                    </div>
                </div>
            </div>

            {{-- VIAGENS DE NEGÓCIOS --}}
            <div class="emission-card" data-tipo="viagens">
                <div class="emission-source-info">
                    <div class="emission-icon-wrap travel"><i class="fi fi-ss-plane-alt"></i></div>
                    <div>
                        <h4>Viagens de Negócios</h4>
                        <p>Viagens aéreas, rodoviárias e hospedagens de negócios.</p>
                    </div>
                </div>
                <div class="emission-field">
                    <label>Distância total (km)</label>
                    <input type="number" name="viagens_km" placeholder="Ex: 32.400"
                        value="{{ old('viagens_km', $fonte->viagens_km ?? 0) }}"
                        oninput="calcular('viagens')" onchange="calcular('viagens')">
                </div>
                <div class="emission-field">
                    <label>Meio de transporte</label>
                    <select name="viagens_meio" onchange="calcular('viagens')">
                        <option value="aereo"       {{ ($fonte->viagens_meio ?? 'aereo') === 'aereo'       ? 'selected' : '' }}>Aéreo</option>
                        <option value="rodoviario"  {{ ($fonte->viagens_meio ?? '') === 'rodoviario'  ? 'selected' : '' }}>Rodoviário</option>
                        <option value="ferroviario" {{ ($fonte->viagens_meio ?? '') === 'ferroviario' ? 'selected' : '' }}>Ferroviário</option>
                    </select>
                </div>
                <div class="emission-result">
                    <label>Emissão (tCO₂e)</label>
                    <div class="value {{ ($fonte->viagens_emissao_tco2e ?? 0) == 0 ? 'zero' : '' }}">
                        {{ number_format($fonte->viagens_emissao_tco2e ?? 0, 1, ',', '.') }}
                    </div>
                </div>
            </div>

            {{-- COMPRAS --}}
            <div class="emission-card" data-tipo="compras">
                <div class="emission-source-info">
                    <div class="emission-icon-wrap shopping"><i class="fi fi-ss-shopping-cart"></i></div>
                    <div>
                        <h4>Compras</h4>
                        <p>Bens e serviços adquiridos pela empresa.</p>
                    </div>
                </div>
                <div class="emission-field">
                    <label>Valor anual (R$)</label>
                    <input type="number" name="compras_valor_reais" placeholder="Ex: 850.000"
                        value="{{ old('compras_valor_reais', $fonte->compras_valor_reais ?? 0) }}"
                        oninput="calcular('compras')" onchange="calcular('compras')">
                </div>
                <div class="emission-field">
                    <label>Categoria principal</label>
                    <select name="compras_categoria" onchange="calcular('compras')">
                        <option value="escritorio"  {{ ($fonte->compras_categoria ?? 'escritorio') === 'escritorio'  ? 'selected' : '' }}>Materiais de escritório</option>
                        <option value="ti"          {{ ($fonte->compras_categoria ?? '') === 'ti'          ? 'selected' : '' }}>Equipamentos de TI</option>
                        <option value="servicos"    {{ ($fonte->compras_categoria ?? '') === 'servicos'    ? 'selected' : '' }}>Serviços terceirizados</option>
                        <option value="alimentacao" {{ ($fonte->compras_categoria ?? '') === 'alimentacao' ? 'selected' : '' }}>Alimentação</option>
                    </select>
                </div>
                <div class="emission-result">
                    <label>Emissão (tCO₂e)</label>
                    <div class="value {{ ($fonte->compras_emissao_tco2e ?? 0) == 0 ? 'zero' : '' }}">
                        {{ number_format($fonte->compras_emissao_tco2e ?? 0, 1, ',', '.') }}
                    </div>
                </div>
            </div>

            <div class="bottom-bar">
                <button type="submit" class="next-btn">
                    Próximo: Revisão →
                </button>
            </div>

        </form>

    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>