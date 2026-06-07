<nav class="navbar navbar-expand-lg navbar-ecocarbon sticky-top">

    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand me-4" href="#">
            <img
                src="{{ asset('img/LogoEcoCarbon.png') }}"
                alt="EcoCarbon"
                class="logo-ecocarbon">
        </a>

        <!-- Mobile -->
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#menu">

            <span class="navbar-toggler-icon"></span>

        </button>

<div class="navbar-collapse" id="menu">
            <!-- Menu -->
            <ul class="navbar-nav mx-auto">

                <li class="nav-item">
                    <a class="nav-link active-nav" href="{{ route('dashboard') }}">Início</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('historico.emissoes') }}">Historico</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('metodologia') }}">Metodologia </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('calculo.novo') }}">Calcular</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('relatorios') }}">Relatórios</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('calculo.resultados') }}">resultados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('calculo.revisao') }}">revisao</a>
                </li>

            </ul>

            <!-- Botões -->
            <div class="navbar-actions">

                <a href="login" class="btn-login">
                    Entrar
                </a>

                <a href="cadastro" class="btn-cadastro">
                    Cadastrar
                </a>
                <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn-logout" >Logout</button>
            </form>
            </div>

        </div>

    </div>

</nav>