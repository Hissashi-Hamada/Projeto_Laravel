@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Produtos</h2>
    <button class="btn btn-primary" onclick="window.location='{{ route('produtos.create') }}'">Novo Produto</button>

</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Nome do Produto</th>
            <th class="text-center">Descrição</th>
            <th class="text-center">Valor</th>
            <th class="text-center">Quantidade</th>
            <th class="text-center">status</th>
            <th width="180">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produtos as $produto)
        <tr>
            <td>{{ $produto->id }}</td>
            <td>{{ $produto->nome  }}</td>
            <td>{{  $produto->descricao  }}</td>
            <td>R$ {{ number_format($produto->valor, 2, ',', '.') }}</td>
            <td>{{  $produto->quantidade  }}</td>
            <td>{{  $produto->status  }}</td>
            
            <td>

                <button type="button" class="btn btn-warning btn-sm"" onclick="window.location='{{ route('produtos.edit', $produto) }}'">
                    Editar
                </button>

                <form action="{{ route('produtos.destroy', $produto) }}" method="POST" class="d-inline">
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
