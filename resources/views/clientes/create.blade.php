@extends('layouts.app')

@section('title', 'Cadastrar Cliente')

@section('content')
<h2>Cadastrar Cliente</h2>

<form action="{{ route('clientes.store') }}" method="POST">
    @csrf

    <div class="form-grid">
        <div class="form-group full">
            <label>Nome</label>
            <input type="text" name="nome" required>
        </div>

        <div class="form-group">
            <label>CPF</label>
            <input type="text" name="cpf" required>
        </div>
        
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label>Telefone</label>
            <input type="text" name="telefone" required>
        </div>

        <div class="form-group">
            <label>Data de Nascimento</label>
            <input type="date" name="data_nascimento" required>
        </div>

        <div class="full">
            <button type="submit">Salvar Cliente</button>
            <button class="btn btn-" onclick="window.location='{{ route('clientes.index') }}'">Voltar</button>
        </div>
    </div>
</form>
@endsection
