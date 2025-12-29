@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
<div class="container">

    {{-- CABEÇALHO --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Clientes</h2>

        <a href="{{ route('clientes.create') }}" class="btn btn-primary">
            Adicionar Cliente
        </a>
    </div>

    {{-- TABELA --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">

            <thead>
                <tr>
                    <th class="text-center" style="width: 60px;">ID</th>
                    <th>Nome</th>
                    <th class="text-center">CPF</th>
                    <th>Email</th>
                    <th class="text-center" style="width: 150px;">
                        Data de Nascimento
                    </th>
                    <th class="text-center">Telefone</th>
                    <th class="text-center" style="width: 160px;">
                        Ações
                    </th>
                </tr>
            </thead>

            <tbody>
                @forelse ($clientes as $cliente)
                    <tr>
                        {{-- ID --}}
                        <td class="text-center">
                            {{ $cliente->id }}
                        </td>

                        {{-- NOME --}}
                        <td>{{ $cliente->nome }}</td>

                        {{-- CPF --}}
                        <td class="text-center">
                            {{ $cliente->cpf }}
                        </td>

                        {{-- EMAIL --}}
                        <td
                            style="max-width: 220px;
                                   white-space: nowrap;
                                   overflow: hidden;
                                   text-overflow: ellipsis;"
                        >
                            {{ $cliente->email }}
                        </td>

                        {{-- DATA DE NASCIMENTO --}}
                        <td class="text-center">
                            {{ $cliente->data_nascimento?->format('d/m/Y') }}
                        </td>

                        {{-- TELEFONE --}}
                        <td class="text-center">
                            {{ $cliente->telefone }}
                        </td>

                        {{-- AÇÕES --}}
                        <td>
                            <div class="d-flex justify-content-center gap-2">

                                <a
                                    href="{{ route('clientes.edit', $cliente->id) }}"
                                    class="btn btn-warning btn-sm"
                                >
                                    Editar
                                </a>

                                <form
                                    action="{{ route('clientes.destroy', $cliente->id) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Deseja excluir este cliente?')"
                                    >
                                        Excluir
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">
                            Nenhum cliente cadastrado.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>
</div>
@endsection
