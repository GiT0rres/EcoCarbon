<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

use App\Http\Controllers\CalculoController;

Route::get('/calculos/novo', [CalculoController::class, 'create'])
    ->name('calculo.novo');

  Route::get('/calculos/fontes-emissao', [CalculoController::class, 'fontesEmissao'])
    ->name('calculo.fontes');

    Route::get('/calculos/revisao', [CalculoController::class, 'revisao'])
    ->name('calculo.revisao');


Route::get('/resultados', [CalculoController::class, 'resultados'])
    ->name('calculo.resultados');