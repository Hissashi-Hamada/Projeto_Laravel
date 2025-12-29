@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('content')
<div class="container">

    <h2 class="mb-4">Editar Cliente</h2>

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

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-grid">

            {{-- NOME --}}
            <div class="form-group">
                <label for="nome">Nome</label>
                <input
                    id="nome"
                    type="text"
                    name="nome"
                    class="form-control @error('nome') is-invalid @enderror"
                    value="{{ old('nome', $cliente->nome) }}"
                >
                @error('nome')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- CPF --}}
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input
                    id="cpf"
                    type="text"
                    name="cpf"
                    maxlength="14"
                    class="form-control @error('cpf') is-invalid @enderror"
                    value="{{ old('cpf', $cliente->cpf) }}"
                >
                @error('cpf')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- EMAIL --}}
            <div class="form-group">
                <label for="email">Email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $cliente->email) }}"
                >
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- DATA DE NASCIMENTO --}}
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento</label>
                <input
                    id="data_nascimento"
                    type="date"
                    name="data_nascimento"
                    class="form-control @error('data_nascimento') is-invalid @enderror"
                    value="{{ old(
                        'data_nascimento',
                        $cliente->data_nascimento
                            ? $cliente->data_nascimento->format('Y-m-d')
                            : ''
                    ) }}"
                >
                @error('data_nascimento')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- TELEFONE --}}
            <div class="form-group full">
                <label for="telefone">Telefone</label>
                <input
                    id="telefone"
                    type="text"
                    name="telefone"
                    maxlength="15"
                    class="form-control @error('telefone') is-invalid @enderror"
                    value="{{ old('telefone', $cliente->telefone) }}"
                >
                @error('telefone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        </div>

        {{-- AÇÕES --}}
        <div class="mt-4 d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                Atualizar
            </button>

            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
                Cancelar
            </a>
        </div>

    </form>
</div>
@endsection
