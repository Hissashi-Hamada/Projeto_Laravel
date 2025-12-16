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
            'nome' => 'required',
            'cpf' => 'required|size:11|unique:clientes,cpf',
            'data_nascimento' => 'required|date',
            'telefone' => 'nullable',
            'email' => 'required|email|unique:clientes,email',
        ]);
    
        Cliente::create($validated);
    
        return redirect()->back()->with('success', 'Cliente cadastrado com sucesso!');
    }


    public function show($id)
    {
        return Cliente::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'sometimes|required',
            'cpf' => 'sometimes|required|size:11|unique:clientes,cpf,' . $id,
            'data_nascimento' => 'sometimes|required|date',
            'telefone' => 'nullable',
            'email' => 'sometimes|required|email|unique:clientes,email,' . $id,
        ]);

        $cliente->update($validated);

        return $cliente;
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return response()->json(['message' => 'Cliente removido']);
    }
}