@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Clientes</h2>
    <a href="{{ route('clientes.create') }}" class="btn btn-primary">Novo Cliente</a>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cpf</th>
            <th>Email</th>
            <th>Data de Nascimento</th>
            <th>Telefone</th>
            <th width="180">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
        <tr>
            <td>{{ $cliente->id }}</td>
            <td>{{ $cliente->nome }}</td>
            <td>{{ $cliente->cpf }}</td>
            <td>{{ $cliente->email }}</td>
            <td>{{ $cliente->data_nascimento}}</td>
            <td>{{ $cliente->telefone}}</td>
            <td>
                <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
