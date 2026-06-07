<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    // ── CADASTRO ───────────────────────────────────────────────────

    public function showCadastro()
    {
        return view('auth.cadastro');
    }

    public function cadastro(Request $request)
    {
        $request->validate([
            'empresa'               => 'required|string|max:255',
            'cnpj'                  => 'required|string|max:18',
            'setor'                 => 'required|string|max:100',
            'funcionarios'          => 'required|integer|min:1',
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email',
            'password'              => ['required', 'confirmed', Password::min(8)],
            'terms'                 => 'accepted',
        ], [
            'empresa.required'      => 'Informe o nome da empresa.',
            'cnpj.required'         => 'Informe o CNPJ.',
            'setor.required'        => 'Selecione o setor de atuação.',
            'funcionarios.required' => 'Informe o número de funcionários.',
            'name.required'         => 'Informe o nome do responsável.',
            'email.required'        => 'Informe o e-mail corporativo.',
            'email.unique'          => 'Este e-mail já está cadastrado.',
            'password.required'     => 'Defina uma senha.',
            'password.confirmed'    => 'As senhas não coincidem.',
            'password.min'          => 'A senha deve ter pelo menos 8 caracteres.',
            'terms.accepted'        => 'Você deve aceitar os Termos de Uso.',
        ]);

        $user = User::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'empresa'      => $request->empresa,
            'cnpj'         => $request->cnpj,
            'setor'        => $request->setor,
            'funcionarios' => $request->funcionarios,
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Conta criada com sucesso! Bem-vindo à EcoCarbon.');
    }

    // ── LOGIN ──────────────────────────────────────────────────────

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required'    => 'Informe o e-mail.',
            'password.required' => 'Informe a senha.',
        ]);

        $credentials = $request->only('email', 'password');
        $remember    = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'E-mail ou senha incorretos.']);
    }

    // ── LOGOUT ─────────────────────────────────────────────────────

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}