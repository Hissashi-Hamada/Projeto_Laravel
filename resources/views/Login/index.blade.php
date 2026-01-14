@extends('layouts.off')

@section('title', 'Cadastrar Cliente')

@section('content')

    <style>
        main {
            max-width: 400px;
            margin: 180px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,.08);
        }

        .cadastro-link {
            font-weight-bold
            grid-column: 1 / -1;
            font-size: 14px;
            color: #475569;
            margin-top: 10px;
            margin-block: 10px;
        }
    </style>

<div class="container">

    <h2 class="mb-4">Login</h2>

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

    <form action="{{ route('login.store') }}" method="POST">
        @csrf

        <div class="form-grid">
            <input
            type="email"
            name="email" value="{{ old('email') }}" class="form-control" placeholder="Digite seu email">
            <input type="password" name="password" class="form-control" placeholder="Digite sua senha">
            <label style="grid-column:1 / -1; margin-top:8px"><input type="checkbox" name="remember"> Lembrar-me</label>
            <div class="cadastro-link">
                NÂO TEM UMA CONTA?
                <a href="{{ route('cadastro.index') }}"><strong>CADASTRE-SE</strong></a>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Logar</button>
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
