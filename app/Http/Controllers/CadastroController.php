<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class CadastroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cadastro.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $data = $request->validate([
        'nome' => ['required','string'],
        'cpf' => ['nullable','string'],
        'data_nascimento' => ['nullable','date_format:d/m/Y'],
        'telefone' => ['required','string'],
        'email' => ['required','email'],
        'senha' => [
            'required',
            'string',
            'min:8',
            'regex:/[a-z]/',
            'regex:/[A-Z]/',
            'regex:/[0-9]/',
            'regex:/[^A-Za-z0-9]/',
        ],
    ], [
        'data_nascimento.date_format' => 'Data de nascimento deve estar no formato DD/MM/AAAA.',
    ]);

    // Convert to DB date format (Y-m-d) if provided
    if (!empty($data['data_nascimento'])) {
        try {
            $data['data_nascimento'] = Carbon::createFromFormat('d/m/Y', $data['data_nascimento'])->format('Y-m-d');
        } catch (\Exception $e) {
            return back()->withErrors(['data_nascimento' => 'Data de nascimento inválida.'])->withInput();
        }
    }

    // Hash password before storing (column `senha`)
    if (!empty($data['senha'])) {
        $data['senha'] = Hash::make($data['senha']);
    }

    Users::create($data);

    return redirect()
        ->route('vendas.index')
        ->with('success', 'Usuario cadastrado com sucesso!');
}

}
