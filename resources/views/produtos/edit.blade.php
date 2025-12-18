@extends('layouts.app')

@section('title', 'Editar Produto')

@section('content')

<h2>Editar Produto</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('produtos.update', $produto->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-grid">

        {{-- Nome --}}
        <div class="form-group full">
            <label>Nome do Produto</label>
            <input
                type="text"
                name="nome"
                value="{{ old('nome', $produto->nome) }}"
                required
            >
        </div>

        {{-- Descrição --}}
        <div class="form-group full">
            <label>Descrição</label>
            <textarea
                name="descricao"
                rows="3"
                maxlength="50"
            >{{ old('descricao', $produto->descricao) }}</textarea>
        </div>

        {{-- Valor --}}
        <div class="form-group">
            <label>Preço (R$)</label>
            <input
                type="number"
                name="valor"
                step="0.01"
                value="{{ old('valor', $produto->valor) }}"
                required
            >
        </div>

        {{-- Quantidade --}}
        <div class="form-group">
            <label>Quantidade</label>
            <input
                type="number"
                name="quantidade"
                value="{{ old('quantidade', $produto->quantidade) }}"
                required
            >
        </div>

        {{-- Status --}}
        <div class="form-group">
            <label>Status</label>
            <select name="status" required>
                <option value="1" {{ old('status', $produto->status) == 1 ? 'selected' : '' }}>
                    Ativo
                </option>
                <option value="0" {{ old('status', $produto->status) == 0 ? 'selected' : '' }}>
                    Inativo
                </option>
            </select>
        </div>

        {{-- Botões --}}
        <div class="full actions">
            <button type="submit" class="edit">
                Atualizar
            </button>

            <a href="{{ route('produtos.index') }}" class="btn btn-secondary">
                Cancelar
            </a>
        </div>

    </div>
</form>

@endsection