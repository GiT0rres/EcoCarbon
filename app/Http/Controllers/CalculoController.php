<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculoController extends Controller
{
    public function create()
    {
        return view('dashboard.novo-calculo');
    }

    public function fontesEmissao()
{
    return view('dashboard.fontes-emissao');
}

public function revisao()
{
    return view('dashboard.Revisao');
}

public function resultados()
{
    return view('dashboard.resultados');
}
public function store(Request $request)
{
    Calculo::create([
        'user_id' => auth()->id(),
        'empresa' => $request->empresa,
        'cnpj' => $request->cnpj,
        'setor' => $request->setor,
        'funcionarios' => $request->funcionarios,
        'cidade' => $request->cidade,
        'estado' => $request->estado,
        'ano_referencia' => $request->ano_referencia,
        'responsavel' => $request->responsavel,
        'email' => $request->email,
    ]);

    return redirect()->route('fontes.emissao');
}
}