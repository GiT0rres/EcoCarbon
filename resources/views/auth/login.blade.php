```html
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <!-- Configurações básicas da página -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título exibido na aba do navegador -->
    <title>Login - EcoCarbon</title>

    <!-- Bibliotecas de ícones utilizadas na interface -->
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-regular-straight/css/uicons-regular-straight.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-thin-rounded/css/uicons-thin-rounded.css">

    <!-- Framework Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Arquivo CSS personalizado -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<!-- Classe principal utilizada para estilizar a página de autenticação -->
<body class="auth-page">

    <!-- Barra superior da aplicação -->
    <header class="auth-topbar">

        <!-- Logo da EcoCarbon -->
        <a href="/">
            <img src="{{ asset('img/LogoEcoCarbon.png') }}" alt="EcoCarbon" style="height:40px; width:auto;">
        </a>

        <!-- Links auxiliares -->
        <div class="auth-topbar-links">
            <a href="#">&#9432; Ajuda</a>
            <a href="#">Contato</a>
        </div>

    </header>

    <!-- Estrutura principal dividida em duas áreas -->
    <div class="auth-layout">

        <!-- Área esquerda com informações institucionais -->
        <div class="auth-left">

            <!-- Elemento decorativo -->
            <div class="auth-left-circle-top"></div>

            <!-- Ícones decorativos -->
            <div class="deco-icons">
                <i class="fi fi-tr-leaf-fall deco-icon" style="top:12%; left:8%;"></i>
                <i class="fi fi-tr-carbon-cloud deco-icon" style="top:32%; right:8%; font-size:40px;"></i>
                <i class="fi fi-tr-leaf-fall deco-icon" style="bottom:22%; right:12%; font-size:22px;"></i>
                <i class="fi fi-rr-chart-histogram deco-icon" style="bottom:12%; left:6%; font-size:26px;"></i>
            </div>

            <!-- Selo informativo -->
            <div class="auth-left-badge" style="position:relative; z-index:1;">
                <i class="fi fi-tr-leaf-fall"></i>
                Plataforma ESG Corporativa
            </div>

            <!-- Título principal -->
            <h1 style="position:relative; z-index:1;">
                Gestão Inteligente<br>de <span>Carbono</span>
            </h1>

            <!-- Texto de apresentação -->
            <p style="position:relative; z-index:1;">
                Monitore, calcule e reduza as emissões de gases de efeito estufa da sua empresa com metodologias reconhecidas internacionalmente.
            </p>

            <!-- Estatísticas demonstrativas -->
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

            <!-- Gráfico ilustrativo de evolução das emissões -->
            <div class="auth-chart-preview">

                <div class="auth-chart-preview-label">
                    Evolução das Emissões — tCO₂e/ano
                </div>

                <div class="auth-chart-bars">
                    <div class="auth-bar" style="height:85%;"></div>
                    <div class="auth-bar" style="height:78%;"></div>
                    <div class="auth-bar" style="height:70%;"></div>
                    <div class="auth-bar" style="height:68%;"></div>
                    <div class="auth-bar highlight" style="height:55%;"></div>
                </div>

                <!-- Anos representados no gráfico -->
                <div class="auth-bar-labels">
                    <span>2020</span>
                    <span>2021</span>
                    <span>2022</span>
                    <span>2023</span>
                    <span>2024</span>
                </div>

            </div>

            <!-- Certificações e metodologias utilizadas -->
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

        <!-- Área direita contendo o formulário -->
        <div class="auth-right">

            <div class="auth-card">

                <!-- Ícone principal do card -->
                <div class="auth-card-logo">
                    <i class="fi fi-rr-leaf"></i>
                </div>

                <!-- Título do formulário -->
                <div class="auth-card-title">Entrar na Conta</div>

                <!-- Texto auxiliar -->
                <div class="auth-card-sub">
                    Bem-vindo de volta! Informe seus dados para acessar a plataforma.
                </div>

                <!-- Formulário de login -->
                <form action="{{ route('login.post') }}" method="POST">

                    <!-- Token de segurança do Laravel -->
                    @csrf

                    <!-- Campo de e-mail -->
                    <div class="auth-field">

                        <label>E-mail Corporativo</label>

                        <div class="auth-input-wrap">
                            <i class="fi fi-rr-envelope"></i>

                            <input
                                type="email"
                                name="email"
                                placeholder="Ex: joao@empresa.com.br"
                                required>
                        </div>

                    </div>

                    <!-- Campo de senha -->
                    <div class="auth-field">

                        <label>Senha</label>

                        <div class="auth-input-wrap">
                            <i class="fi fi-rr-lock"></i>

                            <input
                                type="password"
                                id="pw-login"
                                name="password"
                                placeholder="Sua senha"
                                required>

                            <!-- Ícone para mostrar ou ocultar senha -->
                            <i class="fi fi-rr-eye toggle-pw" onclick="togglePw('pw-login', this)"></i>
                        </div>

                    </div>

                    <!-- Opções adicionais -->
                    <div class="auth-row">

                        <!-- Opção para manter sessão ativa -->
                        <label class="auth-check">
                            <input type="checkbox" name="remember">
                            Lembrar acesso
                        </label>

                        <!-- Recuperação de senha -->
                        <a href="{{ route('password.request') }}" class="auth-forgot">
                            Esqueci minha senha
                        </a>

                    </div>

                    <!-- Botão de login -->
                    <button type="submit" class="btn-auth">
                        <i class="fi fi-rr-sign-in-alt"></i>
                        Entrar na Plataforma
                    </button>

                </form>

                <!-- Separador visual -->
                <div class="auth-divider">
                    <hr>
                    <span>ou</span>
                    <hr>
                </div>

                <!-- Link para cadastro -->
                <div class="auth-signup">
                    Não possui conta?
                    <a href="{{ route('cadastro') }}">Criar cadastro gratuito</a>
                </div>

                <!-- Informações de segurança -->
                <div class="auth-security">
                    <i class="fi fi-rr-lock"></i>
                    Conexão segura · Dados criptografados · LGPD
                </div>

            </div>

        </div>

    </div>

    <script>

        // Função responsável por mostrar ou esconder a senha digitada
        function togglePw(id, icon) {

            const input = document.getElementById(id);

            if (input.type === 'password') {

                input.type = 'text';

                icon.classList.replace(
                    'fi-rr-eye',
                    'fi-rr-eye-crossed'
                );

            } else {

                input.type = 'password';

                icon.classList.replace(
                    'fi-rr-eye-crossed',
                    'fi-rr-eye'
                );
            }
        }

    </script>

</body>
</html>
```
