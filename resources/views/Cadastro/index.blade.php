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
            font-style: italic;
            color: #000000;
            margin: 0 auto 10px;
        }
        .error-alert {
            display: none;
            background-color: #fee;
            color: #c33;
            border: 1px solid #fcc;
            border-radius: 4px;
            padding: 10px;
            margin-top: 5px;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .error-alert.show {
            display: block;
        }
        .input-error {
            border-color: #c33 !important;
            background-color: #fff5f5;
        }


    </style>

<div class="container">

    <h2 class="mb-4">Cadastro</h2>
    <form action="{{ route('cadastro.store') }}" method="POST">
        @csrf

        <div class="form-grid">
            <input type="text" name="nome" placeholder="Digite seu nome completo">

            <input type="text" name="email" placeholder="Digite seu email">

            <input type="text" name="cpf" id="cpf" placeholder="CPF 000.000.000-00">
            <div id="cpf-error" class="error-alert"></div>

            <input type="text" name="telefone" placeholder="TELEFONE (XX) XXXXX-XXXX">

            <input type="text" id="data_nascimento" name="data_nascimento" placeholder="DATA DE NASCIMENTO DD/MM/AAAA">
            <div id="data-error" class="error-alert"></div>

            <input type="password" id="passwordInput" name="senha" placeholder="Digite sua senha" />

            <div class="password-strength-bar">
                <div id="password-strength-indicator" class="strength-indicator"></div>
            </div>
            <p id="tip">Sua senha precisa conter letras, minúsculas e maiúsculas, números e 
            caracteres especiais.
            </p>
            <div id="password-error" class="error-alert"></div>
            
        </div>

        <div class="cadastro-link">
                JÁ TEM UMA CONTA?
            <a href="{{ route('login.index') }}"><strong>LOGAR-SE</strong></a>
        </div>

        <button type="submit" id="submitBtn" class="btn btn-primary mt-3">
            Cadastrar
        </button>

    </form>

</div>
@endsection
<script src="{{ asset('js/utils/passwordStrength.js') }}"></script>
@push('scripts')
<script>
    // Validação de CPF
    function validarCPF(cpf) {
        cpf = cpf.replace(/\D/g, '');
        if (cpf.length !== 11) return false;
        
        // Verifica se todos os dígitos são iguais
        if (/^(\d)\1{10}$/.test(cpf)) return false;
        
        // Calcula primeiro dígito verificador
        let soma = 0;
        let resto;
        for (let i = 1; i <= 9; i++) {
            soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
        }
        resto = (soma * 10) % 11;
        if (resto === 10 || resto === 11) resto = 0;
        if (resto !== parseInt(cpf.substring(9, 10))) return false;
        
        // Calcula segundo dígito verificador
        soma = 0;
        for (let i = 1; i <= 10; i++) {
            soma += parseInt(cpf.substring(i - 1, i)) * (12 - i);
        }
        resto = (soma * 10) % 11;
        if (resto === 10 || resto === 11) resto = 0;
        if (resto !== parseInt(cpf.substring(10, 11))) return false;
        
        return true;
    }

    // Validação de data de nascimento
    function validarData(data) {
        const regex = /^(\d{2})\/(\d{2})\/(\d{4})$/;
        const match = data.match(regex);
        if (!match) return false;
        
        const dia = parseInt(match[1]);
        const mes = parseInt(match[2]);
        const ano = parseInt(match[3]);
        
        // Validar mês
        if (mes < 1 || mes > 12) return false;
        
        // Validar dia
        if (dia < 1 || dia > 31) return false;
        
        // Meses com 30 dias
        if ((mes === 4 || mes === 6 || mes === 9 || mes === 11) && dia > 30) return false;
        
        // Fevereiro
        if (mes === 2) {
            const ehBissexto = (ano % 4 === 0 && ano % 100 !== 0) || (ano % 400 === 0);
            if (dia > (ehBissexto ? 29 : 28)) return false;
        }
        
        // Validar se é uma data válida (não pode ser futura)
        const dataAtual = new Date();
        const dataNascimento = new Date(ano, mes - 1, dia);
        if (dataNascimento > dataAtual) return false;
        
        return true;
    }

    // Validação de força de senha
    function validarSenha(senha) {
        if (senha.length < 8) return false;
        
        const temMinuscula = /[a-z]/.test(senha);
        const temMaiuscula = /[A-Z]/.test(senha);
        const temNumero = /\d/.test(senha);
        const temEspecial = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(senha);
        
        return temMinuscula && temMaiuscula && temNumero && temEspecial;
    }

    // Event listeners para validação em tempo real
    document.getElementById('cpf').addEventListener('blur', function() {
        const cpfError = document.getElementById('cpf-error');
        const cpfInput = document.getElementById('cpf');
        
        if (this.value && !validarCPF(this.value)) {
            cpfError.textContent = '❌ CPF inválido. Verifique o número digitado.';
            cpfError.classList.add('show');
            cpfInput.classList.add('input-error');
        } else {
            cpfError.classList.remove('show');
            cpfInput.classList.remove('input-error');
        }
    });

    document.getElementById('data_nascimento').addEventListener('blur', function() {
        const dataError = document.getElementById('data-error');
        const dataInput = document.getElementById('data_nascimento');
        
        if (this.value && !validarData(this.value)) {
            dataError.textContent = '❌ Data inválida. Use o formato DD/MM/AAAA.';
            dataError.classList.add('show');
            dataInput.classList.add('input-error');
        } else {
            dataError.classList.remove('show');
            dataInput.classList.remove('input-error');
        }
    });

    document.getElementById('passwordInput').addEventListener('blur', function() {
        const passwordError = document.getElementById('password-error');
        const passwordInput = document.getElementById('passwordInput');
        
        if (this.value && !validarSenha(this.value)) {
            passwordError.textContent = '❌ Senha fraca. Precisa ter letras (maiúsculas e minúsculas), números e caracteres especiais.';
            passwordError.classList.add('show');
            passwordInput.classList.add('input-error');
        } else {
            passwordError.classList.remove('show');
            passwordInput.classList.remove('input-error');
        }
    });

    // Validação ao submeter o formulário
    document.querySelector('form').addEventListener('submit', function(e) {
        const cpf = document.getElementById('cpf').value;
        const data = document.getElementById('data_nascimento').value;
        const senha = document.getElementById('passwordInput').value;
        
        let hasError = false;

        // Validar CPF
        if (cpf && !validarCPF(cpf)) {
            document.getElementById('cpf-error').textContent = '❌ CPF inválido.';
            document.getElementById('cpf-error').classList.add('show');
            document.getElementById('cpf').classList.add('input-error');
            hasError = true;
        }

        // Validar data
        if (data && !validarData(data)) {
            document.getElementById('data-error').textContent = '❌ Data inválida.';
            document.getElementById('data-error').classList.add('show');
            document.getElementById('data_nascimento').classList.add('input-error');
            hasError = true;
        }

        // Validar senha
        if (senha && !validarSenha(senha)) {
            document.getElementById('password-error').textContent = '❌ Senha fraca.';
            document.getElementById('password-error').classList.add('show');
            document.getElementById('passwordInput').classList.add('input-error');
            hasError = true;
        }

        if (hasError) {
            e.preventDefault();
            alert('⚠️ Corrija os erros no formulário antes de enviar.');
        }
    });

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
