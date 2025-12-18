<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

   public function store(Request $request)
    {
        $validated = $request->validate([
        'nome' => 'required|string|max:255',
        'cpf' => 'required|string|max:20',
        'email' => 'required|email',
        'data_nascimento' => 'nullable|string|max:255',
        'telefone' => 'nullable|string|max:20',
        ]);
    
        Cliente::create($validated);
    
        return redirect()->back()->with('success', 'Cliente cadastrado com sucesso!');
    }
   public function create()
    {
        return view('clientes.create');
    }


    public function show($id)
    {
       $cliente = Cliente::findOrFail($id);
       return view('clientes.index', compact('clientes'));
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }


    public function update(Request $request, $id)   
    {
        $cliente = Cliente::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:20|unique:clientes,cpf,' . $cliente->id,
            'email' => 'required|email|unique:clientes,email,' . $cliente->id,
            'data_nascimento' => 'nullable|date',
            'telefone' => 'nullable|string|max:20',
        ]);

        $cliente->update($validated);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente atualizado com sucesso');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return response()->json(['message' => 'Cliente removido']);
    }
}