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
    
        $validated['cpf'] = $this->formatCpf($validated['cpf']);
        $validated['telefone'] = $this->formatTelefone($validated['telefone']);
    
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

        $validated['cpf'] = $this->formatCpf($validated['cpf']);
        $validated['telefone'] = $this->formatTelefone($validated['telefone']);

        $cliente->update($validated);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente atualizado com sucesso');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente removido com sucesso!');
    }
    
    private function formatCpf($cpf)
    {
        $cpf = preg_replace('/\D/', '', $cpf);
        $cpf = substr($cpf, 0, 11);
        if (strlen($cpf) <= 3) return $cpf;
        if (strlen($cpf) <= 6) return preg_replace('/(\d{3})(\d{1,3})/', '$1.$2', $cpf);
        if (strlen($cpf) <= 9) return preg_replace('/(\d{3})(\d{3})(\d{1,3})/', '$1.$2.$3', $cpf);
        return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{1,2})/', '$1.$2.$3-$4', $cpf);
    }

    private function formatTelefone($telefone)
    {
        if (!$telefone) return $telefone;
        $telefone = preg_replace('/\D/', '', $telefone);
        $telefone = substr($telefone, 0, 11);
        if (strlen($telefone) <= 2) return $telefone;
        if (strlen($telefone) <= 6) return preg_replace('/(\d{2})(\d{1,4})/', '($1) $2', $telefone);
        if (strlen($telefone) <= 10) return preg_replace('/(\d{2})(\d{4})(\d{1,4})/', '($1) $2-$3', $telefone);
        return preg_replace('/(\d{2})(\d{5})(\d{1,4})/', '($1) $2-$3', $telefone);
    }
}