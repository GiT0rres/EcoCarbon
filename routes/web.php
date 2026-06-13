<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalculoController;

// ── PÁGINAS PÚBLICAS ────────────────────────────────────────────────

Route::get('/', function () {
    return view('home');
});

// ── AUTENTICAÇÃO ────────────────────────────────────────────────────

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.post');

    Route::get('/cadastro', [AuthController::class, 'showCadastro'])
        ->name('cadastro');

    Route::post('/cadastro', [AuthController::class, 'cadastro'])
        ->name('cadastro.post');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::get('/esqueci-senha', fn() => 'Página em construção')
    ->name('password.request');

// ── ÁREA AUTENTICADA ────────────────────────────────────────────────

Route::middleware('auth')->group(function () {

    // Dashboard / Início
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');

    // ── Fluxo de cálculo ─────────────────────────────────────────

    // Etapa 1: Dados da empresa (GET exibe / POST salva)
    // Etapa 1
    Route::get('/calculos/novo', [CalculoController::class, 'create'])
        ->name('calculo.novo');

    Route::post('/calculos/novo', [CalculoController::class, 'store'])
        ->name('calculo.novo.post');

    // Etapa 2
    Route::get('/calculos/fontes-emissao', [CalculoController::class, 'fontesEmissao'])
        ->name('calculo.fontes');

    // Etapa 3
    Route::get('/calculos/revisao', [CalculoController::class, 'revisao'])
        ->name('calculo.revisao');

  Route::post('/calculos/fontes-emissao', [CalculoController::class, 'storeFontes'])
    ->name('calculo.fontes.post');

    Route::post('/calculos/revisao', function () {
    return redirect()->route('calculo.resultados');
})->name('calculo.revisao.post');

    // Etapa 4
    Route::get('/calculos/resultados/{id?}', [CalculoController::class, 'resultados'])
        ->name('calculo.resultados');

    // ── Páginas de apoio ─────────────────────────────────────────

    Route::get('/relatorios', [CalculoController::class, 'relatorios'])
        ->name('relatorios');

    Route::get('/historico-emissoes', [CalculoController::class, 'historicoEmissoes'])
        ->name('historico.emissoes');

    Route::get('/metodologia', [CalculoController::class, 'metodologia'])
        ->name('metodologia');
    
});


Route::fallback(function () {
    return redirect('/');
});
