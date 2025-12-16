@extends('layouts.app')

@section('content')
<h2 class="mb-4">Novo Produto</h2>

<form action="{{ route('produtos.store') }}" method="POST">
    @csrf

    {{-- Nome --}}
    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Produto</label>
        <input 
            type="text" 
            name="nome" 
            id="nome"
            class="form-control @error('nome') is-invalid @enderror"
            value="{{ old('nome') }}"
            required
        >
        @error('nome')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Descrição --}}
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
       <textarea 
            name="descricao" 
            id="descricao"
            class="form-control"
            rows="3"
        >{{ old('descricao') }}</textarea>
        @error('descricao')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Preço --}}
    <div class="mb-3">
        <label for="preco" class="form-label">Preço (R$)</label>
        <input 
            type="number" 
            name="valor" 
            id="valor"
            step="0.01"
            class="form-control"
            value="{{ old('valor') }}"
            required
        >
        @error('preco')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Quantidade --}}
    <div class="mb-3">
        <label for="quantidade" class="form-label">Quantidade</label>
        <input 
            type="number" 
            name="quantidade" 
            id="quantidade"
            class="form-control @error('quantidade') is-invalid @enderror"
            value="{{ old('quantidade') }}"
            required
        >
        @error('quantidade')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Status --}}
    <div class="mb-4">
        <label for="status" class="form-label">Status</label>
        <select 
            name="status" 
            id="status"
            class="form-select @error('status') is-invalid @enderror"
            required
        >
            <option value="1">Ativo</option>
            <option value="0">Inativo</option>
        </select>
        @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Botões --}}
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-success">
            💾 Salvar
        </button>

        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">
            ⬅ Voltar
        </a>
    </div>
</form>
@endsection
