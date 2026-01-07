@extends('layouts.off')

@section('content')

    <style>
        main {
            max-width: 540px;
            margin: 100px auto;
            background: #fff;
            padding: 26px;
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
        .password-strength-bar {
            width: 100%;
            height: 8px;
            background-color: #ddd;
            border-radius: 4px; 
            margin-top: 5px;
            box-shadow: inset 0 1px 3px rgba(0,0,0,.2);
            overflow: hidden;
        }
        .strength-indicator {
            height: 100%;
            width: 0;
            border-radius: 4px;
            transition: width 0.5 ease, background-color 0.5s ease;
        }
        .password-strength-text {
            color: #666;
            font-size: 0.9rem;
        }
        #tip {
            font-style: italic
            color: #000000;
            margin: 0 auto 10px;
        }


    </style>

<div class="container">

    <h2 class="mb-4">Cadastro</h2>
    <form action="{{ route('cadastro.store') }}" method="POST">
        @csrf

        <div class="form-grid">
            <input type="text" name="nome" placeholder="Digite seu nome completo">

            <input type="text" name="email" placeholder="Digite seu email">

            <input type="text" name="cpf" placeholder="CPF 000.000.000-00">

            <input type="text" name="telefone" placeholder="TELEFONE (XX) XXXXX-XXXX">

            <input type="text" id="data_nascimento" name="data_nascimento" placeholder="DATA DE NASCIMENTO DD/MM/AAAA">

            <input type="password" id="passwordInput" name="senha" placeholder="Digite sua senha" />

            <div class="password-strength-bar">
                <div id="password-strength-indicator" class="strength-indicator"></div>
            </div>
            <p id="tip">Sua senha precisa conter letras, minúsculas e maiúsculas, números e 
            caracteres especiais.
            </p>
            
        </div>

        <div class="cadastro-link">
                JÁ TEM UMA CONTA?
            <a href="{{ route('login.index') }}"><strong>LOGAR-SE</strong></a>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Cadastrar</button>
    </form>

</div>
@endsection
<script src="{{ asset('js/utils/passwordStrength.js') }}"></script>
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
