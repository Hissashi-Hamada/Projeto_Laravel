@extends('layouts.app')

@section('title', 'Cadastrar Cliente')

@section('content')

<h2 class="mb-4">Cadastrar Cliente</h2>

{{-- ALERTA DE ERROS --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Erro ao cadastrar cliente:</strong>
        <ul class="mb-0">
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('clientes.store') }}" method="POST">
    @csrf

    <div class="form-grid">

        <div class="form-group full">
            <label>Nome</label>
            <input
                type="text"
                name="nome"
                class="form-control @error('nome') is-invalid @enderror"
                value="{{ old('nome') }}"
            >

            @error('nome')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label>CPF</label>
                <input
                    type="text"
                    name="cpf"
                    maxlength="14"
                    class="form-control @error('cpf') is-invalid @enderror"
                    value="{{ old('cpf') }}"
                >

                @error('cpf')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
        </div>

        <div class="form-group">
            <label>Email</label>
            <input
                type="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}"
            >

            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Telefone</label>
            <input
                type="text"
                name="telefone"
                maxlength="15"
                class="form-control"
                value="{{ old('telefone') }}"
            >
        </div>

        <div class="form-group">
            <label>Data de Nascimento</label>
            <input
                type="text"
                name="data_nascimento"
                class="form-control"
                placeholder="dd/mm/aaaa"
                value="{{ old('data_nascimento') }}"
            >
        </div>

        <div class="full actions mt-3">
            <button type="submit" class="btn btn-success">
                Salvar Cliente
            </button>

            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
                Voltar
            </a>
        </div>

    </div>
</form>
<script>
    document.querySelector('input[name="data_nascimento"]').addEventListener('input', function (e) {
        let v = e.target.value.replace(/\D/g, '').slice(0, 8);
    
        if (v.length >= 5) {
            e.target.value = v.replace(/(\d{2})(\d{2})(\d{0,4})/, '$1/$2/$3');
        } else if (v.length >= 3) {
            e.target.value = v.replace(/(\d{2})(\d{0,2})/, '$1/$2');
        } else {
            e.target.value = v;
        }
    });
</script>


@endsection
