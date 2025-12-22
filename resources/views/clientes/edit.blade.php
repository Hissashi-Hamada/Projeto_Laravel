@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('content')

<h2>Editar Cliente</h2>

{{-- Erros de validação --}}
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

        <div class="form-group">
            <label>Nome</label>
            <input
                type="text"
                name="nome"
                value="{{ old('nome', $cliente->nome) }}"
            >
        </div>

        <div class="form-group">
            <label>CPF</label>
            <input
                type="text"
                name="cpf"
                maxlength="14"
                value="{{ old('cpf', $cliente->cpf) }}"
            >
        </div>

        <div class="form-group">
            <label>Email</label>
            <input
                type="email"
                name="email"
                value="{{ old('email', $cliente->email) }}"
            >
        </div>

        <div class="form-group">
            <label>Data de Nascimento</label>
            <input
                type="date"
                name="data_nascimento"
                value="{{ old('data_nascimento', $cliente->data_nascimento ? $cliente->data_nascimento->format('Y-m-d') : '') }}"
            >
        </div>

        <div class="form-group full">
            <label>Telefone</label>
            <input
                type="text"
                name="telefone"
                maxlength="15"
                value="{{ old('telefone', $cliente->telefone) }}"
            >
        </div>

    </div>

    <div class="mt-4 d-flex gap-2">
        <button type="submit" class="btn btn-primary">
            Atualizar
        </button>

        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
            Cancelar
        </a>
    </div>

</form>

@endsection
