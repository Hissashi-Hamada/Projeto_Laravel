@extends('layouts.app')

@section('title', 'Editar Produto')

@section('content')
<div class="container">

    <h2 class="mb-4">Editar Produto</h2>

    {{-- ALERTA DE ERROS --}}
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

            {{-- NOME --}}
            <div class="form-group full">
                <label for="nome">Nome do Produto</label>
                <input
                    id="nome"
                    type="text"
                    name="nome"
                    class="form-control @error('nome') is-invalid @enderror"
                    value="{{ old('nome', $produto->nome) }}"
                    required
                >
                @error('nome')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            

            {{-- DESCRIÇÃO --}}
            <div class="form-group full">
                <label for="descricao">Descrição</label>
                <textarea
                    id="descricao"
                    name="descricao"
                    rows="3"
                    maxlength="50"
                    class="form-control @error('descricao') is-invalid @enderror"
                >{{ old('descricao', $produto->descricao) }}</textarea>
                @error('descricao')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- PREÇO --}}
            <div class="form-group">
                <label for="valor">Preço (R$)</label>
                <input
                    id="valor"
                    type="number"
                    name="valor"
                    step="0.01"
                    class="form-control @error('valor') is-invalid @enderror"
                    value="{{ old('valor', $produto->valor) }}"
                    required
                >
                @error('valor')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- QUANTIDADE --}}
            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input
                    id="quantidade"
                    type="number"
                    name="quantidade"
                    class="form-control @error('quantidade') is-invalid @enderror"
                    value="{{ old('quantidade', $produto->quantidade) }}"
                    required
                >
                @error('quantidade')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- STATUS --}}
            <div class="form-group">
                <label for="status">Status</label>
                <select
                    id="status"
                    name="status"
                    class="form-control @error('status') is-invalid @enderror"
                    required
                >
                    <option value="1" {{ old('status', $produto->status) == 1 ? 'selected' : '' }}>
                        Ativo
                    </option>
                    <option value="0" {{ old('status', $produto->status) == 0 ? 'selected' : '' }}>
                        Inativo
                    </option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- AÇÕES --}}
            <div class="full actions mt-3">
                <button type="submit" class="btn btn-primary">
                    Atualizar
                </button>

                <a href="{{ route('produtos.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
            </div>

        </div>
    </form>
</div>
@endsection
