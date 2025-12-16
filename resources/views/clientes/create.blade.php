@extends('layouts.app')

@section('content')
<h2>Novo Cliente</h2>

<form action="{{ route('clientes.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Cpf</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Data de Nascimento</label>
        <input type="text" name="nome" class="form-control" required>
    </div>
   
    <div class="mb-3">
        <label>Telefone</label>
        <input type="text" name="nome" class="form-control" required>
    </div>


    <button class="btn btn-success">Salvar</button>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
