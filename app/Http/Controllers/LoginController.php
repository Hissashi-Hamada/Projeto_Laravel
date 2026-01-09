<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request as HttpRequest;

class LoginController extends Controller
{
    public function index()
    {
        // Se o usuário já estiver logado, manda para a home
        if (Auth::check()) {
            return redirect()->route('vendas.index');
        }
        return view('login.index');
    }

    public function store(Request $request)
    {
        // 1. Validação
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O email informado é inválido.',
            'password.required' => 'A senha é obrigatória.',
        ]);

        // 2. Tentativa de Login (provider usa App\Models\Cadastro)
        $attempt = Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
        ], $request->boolean('remember'));

        if ($attempt) {
            $request->session()->regenerate();

            return redirect()->intended('vendas')
                ->with('success', 'Bem-vindo de volta!');
        }

        // 3. Falha no login
        return back()->withErrors([
            'login_error' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ])->onlyInput('name');
    }

    // Método para deslogar
    public function destroy(HttpRequest $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function logout(HttpRequest $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
