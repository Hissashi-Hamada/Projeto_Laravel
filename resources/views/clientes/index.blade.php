@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Clientes</h2>
    <button class="btn btn-primary" onclick="window.location='{{ route('clientes.create') }}'">Adicionar Cliente</button>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Nome</th>
            <th class="text-center">CPF</th>
            <th class="text-center">Email</th>
            <th width="155">Data de Nascimento</th>
            <th class="text-center">Telefone</th>
            <th class="text-center" width="180">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
        <tr>
            <td>{{ $cliente->id }}</td>
            <td>{{ $cliente->nome }}</td>
            <td>{{ $cliente->cpf }}</td>
            <td>{{ $cliente->email }}</td>
            <td>{{ $cliente->data_nascimento ? \Carbon\Carbon::parse($cliente->data_nascimento)->format('d/m/Y') : '' }}</td>
            <td>{{ $cliente->telefone}}</td>
            <td>

                <button type="button" class="btn btn-warning btn-sm" onclick="window.location='{{ route('clientes.edit', $cliente) }}'">
                    Editar
                </button>

                <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirmarExclusao()">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
