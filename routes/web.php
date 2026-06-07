<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/relatorios', function () {
    return view('relatorios');
})->name('relatorios');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/cadastro', function () {
    return view('auth.cadastro');
})->name('cadastro');

Route::get('/esqueci-senha', function () {
    return 'Página em construção';
})->name('password.request');

use App\Http\Controllers\CalculoController;

Route::get('/calculos/novo', [CalculoController::class, 'create'])
    ->name('calculo.novo');

  Route::get('/calculos/fontes-emissao', [CalculoController::class, 'fontesEmissao'])
    ->name('calculo.fontes');

    Route::get('/calculos/revisao', [CalculoController::class, 'revisao'])
    ->name('calculo.revisao');


Route::get('/resultados', [CalculoController::class, 'resultados'])
    ->name('calculo.resultados');

Route::get('/relatorios', [CalculoController::class, 'relatorios'])
    ->name('relatorios');


Route::get('/historico-emissoes', [CalculoController::class, 'historicoEmissoes'])
    ->name('historico.emissoes');

Route::get('/metodologia', [CalculoController::class, 'metodologia'])
    ->name('metodologia');

    Route::get('/login', [CalculoController::class, 'login'])
    ->name('login');

Route::get('/cadastro', [CalculoController::class, 'cadastro'])
    ->name('cadastro');