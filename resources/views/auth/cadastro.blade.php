<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - EcoCarbon</title>

    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-regular-straight/css/uicons-regular-straight.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/4.0.0/uicons-thin-rounded/css/uicons-thin-rounded.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

</head>

<body>

    <!-- TOPBAR -->
    <header class="auth-topbar">
        <a href="/">
            <img src="{{ asset('img/LogoEcoCarbon.png') }}" alt="EcoCarbon" style="height:44px; width:auto;">
        </a>
        <div class="auth-topbar-links">
            <a href="{{ route('login') }}" class="btn-login-top">
                <i class="fi fi-rr-sign-in-alt" style="font-size:13px;"></i>
                Fazer Login
            </a>
        </div>
    </header>

    <!-- CONTEÚDO -->
    <div class="register-layout">
        <div class="register-card">

            <div class="register-card-title">
                <i class="fi fi-rr-building"></i>
                Criar Conta Empresarial
            </div>
            <div class="register-card-sub">Preencha os dados abaixo para começar a usar a EcoCarbon.</div>

            <!-- Steps -->
            <div class="register-steps">
                <div class="reg-step active">
                    <div class="reg-step-circle">1</div>
                    <span>Empresa</span>
                </div>
                <div class="reg-step-line"></div>
                <div class="reg-step">
                    <div class="reg-step-circle">2</div>
                    <span>Responsável</span>
                </div>
                <div class="reg-step-line"></div>
                <div class="reg-step">
                    <div class="reg-step-circle">3</div>
                    <span>Acesso</span>
                </div>
            </div>

            <form action="{{ route('cadastro') }}" method="POST">
                @csrf

                <!-- Seção: Dados da Empresa -->
                <div class="form-section-label">Dados da Empresa</div>

                <div class="auth-grid-2">
                    <div class="auth-field">
                        <label>Nome da Empresa <span class="required">*</span></label>
                        <div class="auth-input-wrap">
                            <i class="fi fi-rr-building field-icon"></i>
                            <input type="text" name="empresa" placeholder="Ex: Alpha Tecnologia" required>
                        </div>
                    </div>
                    <div class="auth-field">
                        <label>CNPJ <span class="required">*</span></label>
                        <div class="auth-input-wrap">
                            <i class="fi fi-rr-hastag field-icon"></i>
                            <input type="text" name="cnpj" placeholder="Ex: 12.345.678/0001-90" required>
                        </div>
                    </div>
                </div>

                <div class="auth-grid-2">
                    <div class="auth-field">
                        <label>Setor de Atuação <span class="required">*</span></label>
                        <div class="auth-input-wrap">
                            <i class="fi fi-rr-briefcase field-icon"></i>
                            <select name="setor">
                                <option value="" disabled selected>Selecione o setor</option>
                                <option>Tecnologia da Informação</option>
                                <option>Indústria</option>
                                <option>Agronegócio</option>
                                <option>Varejo</option>
                                <option>Serviços</option>
                            </select>
                        </div>
                    </div>
                    <div class="auth-field">
                        <label>Número de Funcionários <span class="required">*</span></label>
                        <div class="auth-input-wrap">
                            <i class="fi fi-rr-users field-icon"></i>
                            <input type="number" name="funcionarios" placeholder="Ex: 150" required>
                        </div>
                    </div>
                </div>

                <!-- Seção: Responsável -->
                <div class="form-section-label">Responsável</div>

                <div class="auth-grid-2">
                    <div class="auth-field">
                        <label>Nome do Responsável <span class="required">*</span></label>
                        <div class="auth-input-wrap">
                            <i class="fi fi-rr-user field-icon"></i>
                            <input type="text" name="name" placeholder="Ex: João da Silva" required>
                        </div>
                    </div>
                    <div class="auth-field">
                        <label>E-mail Corporativo <span class="required">*</span></label>
                        <div class="auth-input-wrap">
                            <i class="fi fi-rr-envelope field-icon"></i>
                            <input type="email" name="email" placeholder="Ex: joao@empresa.com.br" required>
                        </div>
                    </div>
                </div>

                <!-- Seção: Acesso -->
                <div class="form-section-label">Acesso</div>

                <div class="auth-grid-2">
                    <div class="auth-field">
                        <label>Senha <span class="required">*</span></label>
                        <div class="auth-input-wrap">
                            <i class="fi fi-rr-lock field-icon"></i>
                            <input type="password" id="pw-reg" name="password" placeholder="Mínimo 8 caracteres" required>
                            <i class="fi fi-rr-eye toggle-pw" onclick="togglePw('pw-reg', this)"></i>
                        </div>
                    </div>
                    <div class="auth-field">
                        <label>Confirmar Senha <span class="required">*</span></label>
                        <div class="auth-input-wrap">
                            <i class="fi fi-rr-lock field-icon"></i>
                            <input type="password" id="pw-confirm" name="password_confirmation" placeholder="Repita a senha" required>
                            <i class="fi fi-rr-eye toggle-pw" onclick="togglePw('pw-confirm', this)"></i>
                        </div>
                    </div>
                </div>

                <!-- Termos -->
                <label class="auth-terms">
                    <input type="checkbox" name="terms" required>
                    Aceito os <a href="#">Termos de Uso</a> e a <a href="#">Política de Privacidade</a> da EcoCarbon.
                </label>

                <button type="submit" class="btn-auth">
                    <i class="fi fi-rr-check-circle"></i>
                    Criar Conta
                </button>

            </form>

            <div class="auth-login-link">
                Já possui uma conta?
                <a href="{{ route('login') }}">Fazer login</a>
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