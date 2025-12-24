@extends('layouts.app')

@section('title', 'Novo Produto')

@section('content')

<h2>Novo Produto</h2>

<form action="{{ route('produtos.store') }}" method="POST">
    @csrf

    <div class="form-grid">

        {{-- Nome --}}
        <div class="form-group full">
            <label for="nome">Nome do Produto</label>
            <input
                type="text"
                name="nome"
                id="nome"
                value="{{ old('nome') }}"
                required
            >
        </div>

        {{-- Descrição --}}
        <div class="form-group full">
            <label for="descricao">Descrição</label>
            <textarea
                name="descricao"
                id="descricao"
                rows="3"
                maxlength="50"
            >{{ old('descricao') }}</textarea>
        </div>

        {{-- Preço --}}
        <div class="form-group">
            <label for="valor">Preço (R$)</label>
            <input
                type="number"
                name="valor"
                id="valor"
                step="0.01"
                value="{{ old('valor') }}"
                required
            >
        </div>

        {{-- Quantidade --}}
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input
                type="number"
                name="quantidade"
                id="quantidade"
                value="{{ old('quantidade') }}"
                required
            >
        </div>

        {{-- Status --}}
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" required>
                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Ativo</option>
                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inativo</option>
            </select>
        </div>

        {{-- Botões --}}
        <div class="full actions">
            <button
                type="submit"
                class="btn btn-primary"
                onclick="return confirm('Deseja adicionar este Produto?')">
                Salvar
            </button>
            <button
                type="button"
                class ="btn btn-secondary"
                onclick="window.location='{{ route('produtos.index') }}'">
                Voltar
            </button>
        </div>
    </div>
</form>

@endsection
