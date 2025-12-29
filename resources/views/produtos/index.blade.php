@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<div class="container">

    {{-- CABEÇALHO --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Produtos</h2>

        <a href="{{ route('produtos.create') }}" class="btn btn-primary">
            Novo Produto
        </a>
    </div>

    {{-- TABELA --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">

            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th>Nome do Produto</th>
                    <th>Descrição</th>
                    <th class="text-center">Valor</th>
                    <th class="text-center">Quantidade</th>
                    <th class="text-center">Status</th>
                    <th class="text-center" style="width: 180px;">
                        Ações
                    </th>
                </tr>
            </thead>

            <tbody>
                @forelse ($produtos as $produto)
                    <tr>
                        {{-- ID --}}
                        <td class="text-center">{{ $produto->id }}</td>

                        {{-- NOME --}}
                        <td>{{ $produto->nome }}</td>

                        {{-- DESCRIÇÃO --}}
                        <td>{{ $produto->descricao }}</td>

                        {{-- VALOR --}}
                        <td class="text-center">
                            R$ {{ number_format($produto->valor, 2, ',', '.') }}
                        </td>

                        {{-- QUANTIDADE --}}
                        <td class="text-center">
                            {{ $produto->quantidade }}
                        </td>

                        {{-- STATUS --}}
                        <td class="text-center">
                            {{ $produto->status ? 'Ativo' : 'Inativo' }}
                        </td>

                        {{-- AÇÕES --}}
                        <td>
                            <div class="d-flex justify-content-center gap-2">

                                <a
                                    href="{{ route('produtos.edit', $produto->id) }}"
                                    class="btn btn-warning btn-sm"
                                >
                                    Editar
                                </a>

                                <form
                                    action="{{ route('produtos.destroy', $produto->id) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Tem certeza que deseja excluir este produto?')"
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
                            Nenhum produto cadastrado.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>
</div>
@endsection
