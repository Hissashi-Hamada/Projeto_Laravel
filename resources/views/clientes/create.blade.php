@extends('layouts.app')

@section('title', 'Cadastrar Cliente')

@section('content')
<div class="container">

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

            {{-- NOME --}}
            <div class="form-group full">
                <label for="nome">Nome</label>
                <input
                    id="nome"
                    type="text"
                    name="nome"
                    class="form-control @error('nome') is-invalid @enderror"
                    value="{{ old('nome') }}"
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
                    value="{{ old('cpf') }}"
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
                    value="{{ old('email') }}"
                >
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- TELEFONE --}}
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input
                    id="telefone"
                    type="text"
                    name="telefone"
                    maxlength="15"
                    class="form-control @error('telefone') is-invalid @enderror"
                    value="{{ old('telefone') }}"
                >
                @error('telefone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- DATA DE NASCIMENTO --}}
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento</label>
                <input
                    id="data_nascimento"
                    type="text"
                    name="data_nascimento"
                    placeholder="dd/mm/aaaa"
                    class="form-control @error('data_nascimento') is-invalid @enderror"
                    value="{{ old('data_nascimento') }}"
                >
                @error('data_nascimento')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- AÇÕES --}}
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
</div>
@endsection

@push('scripts')
<script>
    document.querySelector('#data_nascimento').addEventListener('input', function (e) {
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
@endpush
