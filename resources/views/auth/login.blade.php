<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EcoCarbon</title>

    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-regular-straight/css/uicons-regular-straight.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-thin-rounded/css/uicons-thin-rounded.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

</head>

<body class="auth-page">

    <!-- TOPBAR -->
    <header class="auth-topbar">
        <a href="/">
            <img src="{{ asset('img/LogoEcoCarbon.png') }}" alt="EcoCarbon" style="height:40px; width:auto;">
        </a>
        <div class="auth-topbar-links">
            <a href="#">&#9432; Ajuda</a>
            <a href="#">Contato</a>
        </div>
    </header>

    <!-- LAYOUT SPLIT -->
    <div class="auth-layout">

        <!-- LADO ESQUERDO -->
        <div class="auth-left">

            <div class="auth-left-circle-top"></div>

            <div class="deco-icons">
                <i class="fi fi-tr-leaf-fall deco-icon" style="top:12%; left:8%;"></i>
                <i class="fi fi-tr-carbon-cloud deco-icon" style="top:32%; right:8%; font-size:40px;"></i>
                <i class="fi fi-tr-leaf-fall deco-icon" style="bottom:22%; right:12%; font-size:22px;"></i>
                <i class="fi fi-rr-chart-histogram deco-icon" style="bottom:12%; left:6%; font-size:26px;"></i>
            </div>

            <div class="auth-left-badge" style="position:relative; z-index:1;">
                <i class="fi fi-tr-leaf-fall"></i>
                Plataforma ESG Corporativa
            </div>

            <h1 style="position:relative; z-index:1;">
                Gestão Inteligente<br>de <span>Carbono</span>
            </h1>

            <p style="position:relative; z-index:1;">
                Monitore, calcule e reduza as emissões de gases de efeito estufa da sua empresa com metodologias reconhecidas internacionalmente.
            </p>

            <div class="auth-stats" style="position:relative; z-index:1;">
                <div class="auth-stat">
                    <strong>-27%</strong>
                    <span>Redução média<br>de emissões</span>
                </div>
                <div class="auth-stat">
                    <strong>1.200+</strong>
                    <span>Empresas<br>cadastradas</span>
                </div>
                <div class="auth-stat">
                    <strong>ISO</strong>
                    <span>14064<br>Certificado</span>
                </div>
            </div>

            <div class="auth-chart-preview">
                <div class="auth-chart-preview-label">Evolução das Emissões — tCO₂e/ano</div>
                <div class="auth-chart-bars">
                    <div class="auth-bar" style="height:85%;"></div>
                    <div class="auth-bar" style="height:78%;"></div>
                    <div class="auth-bar" style="height:70%;"></div>
                    <div class="auth-bar" style="height:68%;"></div>
                    <div class="auth-bar highlight" style="height:55%;"></div>
                </div>
                <div class="auth-bar-labels">
                    <span>2020</span>
                    <span>2021</span>
                    <span>2022</span>
                    <span>2023</span>
                    <span>2024</span>
                </div>
            </div>

            <div class="auth-certs">
                <div class="auth-cert-badge">
                    <i class="fi fi-rr-shield-check"></i>
                    GHG Protocol
                </div>
                <div class="auth-cert-badge">
                    <i class="fi fi-rr-globe"></i>
                    ISO 14064
                </div>
                <div class="auth-cert-badge">
                    <i class="fi fi-rr-star"></i>
                    GRI Standards
                </div>
            </div>

        </div>

        <!-- LADO DIREITO -->
        <div class="auth-right">
            <div class="auth-card">

                <div class="auth-card-logo">
                    <i class="fi fi-rr-leaf"></i>
                </div>

                <div class="auth-card-title">Entrar na Conta</div>
                <div class="auth-card-sub">Bem-vindo de volta! Informe seus dados para acessar a plataforma.</div>

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf

                    <div class="auth-field">
                        <label>E-mail Corporativo</label>
                        <div class="auth-input-wrap">
                            <i class="fi fi-rr-envelope"></i>
                            <input type="email" name="email" placeholder="Ex: joao@empresa.com.br" required>
                        </div>
                    </div>

                    <div class="auth-field">
                        <label>Senha</label>
                        <div class="auth-input-wrap">
                            <i class="fi fi-rr-lock"></i>
                            <input type="password" id="pw-login" name="password" placeholder="Sua senha" required>
                            <i class="fi fi-rr-eye toggle-pw" onclick="togglePw('pw-login', this)"></i>
                        </div>
                    </div>

                    <div class="auth-row">
                        <label class="auth-check">
                            <input type="checkbox" name="remember">
                            Lembrar acesso
                        </label>
                        <a href="{{ route('password.request') }}" class="auth-forgot">Esqueci minha senha</a>
                    </div>

                    <button type="submit" class="btn-auth">
                        <i class="fi fi-rr-sign-in-alt"></i>
                        Entrar na Plataforma
                    </button>

                </form>

                <div class="auth-divider">
                    <hr><span>ou</span><hr>
                </div>

                <div class="auth-signup">
                    Não possui conta?
                    <a href="{{ route('cadastro') }}">Criar cadastro gratuito</a>
                </div>

                <div class="auth-security">
                    <i class="fi fi-rr-lock"></i>
                    Conexão segura · Dados criptografados · LGPD
                </div>

            </div>
        </div>

    </div>

    <script>
        function togglePw(id, icon) {
            const input = document.getElementById(id);
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fi-rr-eye', 'fi-rr-eye-crossed');
            } else {
                input.type = 'password';
                icon.classList.replace('fi-rr-eye-crossed', 'fi-rr-eye');
            }
        }
    </script>

</body>
</html>