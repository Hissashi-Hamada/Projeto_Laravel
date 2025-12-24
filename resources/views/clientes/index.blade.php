@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Clientes</h2>

    <a href="{{ route('clientes.create') }}" class="btn btn-primary">
        Adicionar Cliente
    </a>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">

        <thead>
            <tr>
                <th class="text-center" style="width: 60px;">ID</th>
                <th>Nome</th>
                <th class="text-center">CPF</th>
                <th>Email</th>
                <th class="text-center" style="width: 150px;">Data de Nascimento</th>
                <th class="text-center">Telefone</th>
                <th class="text-center" style="width: 160px;">Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td class="text-center">{{ $cliente->id }}</td>

                    <td>{{ $cliente->nome }}</td>

                    <td class="text-center">{{ $cliente->cpf }}</td>

                    <td style="max-width: 220px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        {{ $cliente->email }}
                    </td>

                    <td class="text-center">
                        {{ $cliente->data_nascimento?->format('d/m/Y') }}
                    </td>

                    <td class="text-center">{{ $cliente->telefone }}</td>

                    <td>
                        <div class="d-flex justify-content-center gap-2">

                            <a href="{{ route('clientes.edit', $cliente->id) }}"
                               class="btn btn-warning btn-sm">
                                Editar
                            </a>

                            <form action="{{ route('clientes.destroy', $cliente->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Deseja excluir este cliente?')">
                                    Excluir
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>

@endsection
