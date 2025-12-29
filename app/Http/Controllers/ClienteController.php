<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateRequest($request);

        if (!$this->cpfValido($data['cpf'])) {
            return back()->withErrors(['cpf' => 'CPF inválido'])->withInput();
        }

        $data = $this->formatData($data);

        Cliente::create($data);

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $data = $this->validateRequest($request, $cliente->id);

        if (!$this->cpfValido($data['cpf'])) {
            return back()->withErrors(['cpf' => 'CPF inválido'])->withInput();
        }

        $data = $this->formatData($data);

        $cliente->update($data);

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente removido com sucesso!');
    }

    private function validateRequest(Request $request, $id = null): array
    {
        return $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:20|unique:clientes,cpf,' . $id,
            'email' => 'required|email|unique:clientes,email,' . $id,
            'data_nascimento' => 'required|string',
            'telefone' => 'required|string|max:20',
        ]);
    }

    private function formatData(array $data): array
    {
        $data['cpf'] = $this->formatCpf($data['cpf']);
        $data['telefone'] = $this->formatTelefone($data['telefone'] ?? null);

        if (!empty($data['data_nascimento'])) {
            $data['data_nascimento'] = Carbon::createFromFormat(
                'd/m/Y',
                $data['data_nascimento']
            )->format('Y-m-d');
        }

        return $data;
    }

    private function formatCpf(string $cpf): string
    {
        $cpf = preg_replace('/\D/', '', $cpf);
        return preg_replace(
            '/(\d{3})(\d{3})(\d{3})(\d{2})/',
            '$1.$2.$3-$4',
            $cpf
        );
    }

    private function formatTelefone(?string $telefone): ?string
    {
        if (!$telefone) return null;

        $telefone = preg_replace('/\D/', '', $telefone);

        return match (strlen($telefone)) {
            11 => preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $telefone),
            10 => preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $telefone),
            default => $telefone,
        };
    }

    private function cpfValido(string $cpf): bool
    {
        $cpf = preg_replace('/\D/', '', $cpf);

        if (strlen($cpf) !== 11 || preg_match('/^(\d)\1{10}$/', $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            $soma = 0;
            for ($i = 0; $i < $t; $i++) {
                $soma += $cpf[$i] * (($t + 1) - $i);
            }

            $digito = ((10 * $soma) % 11) % 10;
            if ($cpf[$t] != $digito) return false;
        }

        return true;
    }
}
