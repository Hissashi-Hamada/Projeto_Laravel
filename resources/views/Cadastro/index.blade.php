@extends('layouts.off')

@section('content')

    <style>
        main {
            max-width: 540px;
            margin:auto;
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
    </style>

<div class="container">

    <h2 class="mb-4">Cadastro</h2>
    <form action="{{ route('cadastro.store') }}" method="POST">
        @csrf

        <div class="form-grid">
            <strong>NOME</strong>
            <input type="text" name="nome">

            <strong>EMAIL</strong>
            <input type="text" name="email">

            <strong>CPF</strong>
            <input type="text" name="cpf">

            <strong>TELEFONE</strong>
            <input type="text" name="telefone">

            <strong>DATA DE NASCIMENTO</strong>
            <input type="text" id="data_nascimento" name="data_nascimento">

            <strong>SENHA</strong>
            <input type="password" name="senha">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Cadastrar</button>
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
