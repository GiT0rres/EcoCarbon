# 🌱 EcoCarbon

Sistema web desenvolvido para auxiliar empresas no cálculo, monitoramento e gestão de emissões de gases de efeito estufa (GEE), promovendo práticas sustentáveis e apoiando estratégias ESG.

---

## 📖 Sobre o Projeto

O **EcoCarbon** é uma plataforma corporativa que permite que empresas realizem o cálculo da sua pegada de carbono de forma simples, organizada e intuitiva.

A aplicação foi desenvolvida com foco em sustentabilidade, conformidade ambiental e gestão estratégica, permitindo que organizações acompanhem suas emissões e identifiquem oportunidades de melhoria.

---

## 🚀 Funcionalidades

### 👤 Autenticação de Usuários

* Cadastro de empresas
* Login e logout
* Controle de acesso com autenticação Laravel
* Recuperação de senha (estrutura preparada)

### 🏢 Cadastro Empresarial

* Nome da empresa
* CNPJ
* Setor de atuação
* Quantidade de funcionários
* Cidade e estado
* Dados do responsável

### ♻️ Cálculo da Pegada de Carbono

Fluxo dividido em etapas:

1. Dados da empresa
2. Fontes de emissão
3. Revisão das informações
4. Resultado do cálculo

### 📊 Relatórios

* Visualização dos resultados
* Acompanhamento dos indicadores ambientais
* Histórico de emissões

### 🌍 ESG e Sustentabilidade

A plataforma auxilia empresas a:

* Reduzir impactos ambientais
* Melhorar indicadores ESG
* Atender exigências ambientais
* Fortalecer sua reputação corporativa
* Tomar decisões baseadas em dados

---

## 🛠 Tecnologias Utilizadas

### Backend

* Laravel 12
* PHP 8+
* Eloquent ORM
* Middleware de autenticação

### Frontend

* Blade Templates
* HTML5
* CSS3
* Bootstrap 5
* JavaScript

### Banco de Dados

* SQLite (ambiente de desenvolvimento)
* Compatível com MySQL e PostgreSQL

---

## 📂 Estrutura do Projeto

```bash
resources/
├── views/
│   ├── auth/
│   │   ├── login.blade.php
│   │   └── cadastro.blade.php
│   │
│   ├── components/
│   │   ├── navbar.blade.php
│   │   ├── hero.blade.php
│   │   └── benefits.blade.php
│   │
│   ├── dashboard/
│   └── home.blade.php
│
routes/
└── web.php

app/
├── Http/
│   └── Controllers/
│       ├── AuthController.php
│       └── CalculoController.php
│
database/
└── migrations/
```

---

## ⚙️ Instalação

### Clonar o repositório

```bash
git clone https://github.com/seu-usuario/ecocarbon.git
```

### Entrar na pasta

```bash
cd ecocarbon
```

### Instalar dependências

```bash
composer install
```

### Configurar ambiente

```bash
cp .env.example .env
```

### Gerar chave da aplicação

```bash
php artisan key:generate
```

### Executar migrations

```bash
php artisan migrate
```

### Iniciar servidor

```bash
php artisan serve
```

A aplicação estará disponível em:

```bash
http://127.0.0.1:8000
```

---

## 📸 Principais Telas

* Página Inicial
* Cadastro Empresarial
* Login
* Dashboard
* Cadastro de Emissões
* Revisão dos Dados
* Relatórios
* Histórico de Emissões

---

## 🎯 Objetivo Acadêmico

Este projeto foi desenvolvido como atividade acadêmica com o objetivo de aplicar conceitos de:

* Desenvolvimento Web
* Laravel Framework
* Banco de Dados
* Engenharia de Software
* Sustentabilidade Corporativa
* ESG (Environmental, Social and Governance)

---

## 👨‍💻 Equipe

Projeto desenvolvido para fins educacionais e acadêmicos.

---

## 📄 Licença

Este projeto possui finalidade acadêmica e educacional.
Todos os direitos reservados aos autores do projeto.

---

### 🌱 EcoCarbon

"Transformando dados ambientais em decisões sustentáveis."



<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
