<!DOCTYPE html>
<html>
<head>
    <title>Teste Clientes</title>
    <style>
        .error { color: red; margin: 10px 0; }
        .success { color: green; margin: 10px 0; }
        form { margin-top: 20px; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input { padding: 5px; width: 300px; }
        button { padding: 10px 20px; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Adicionar Cliente</h1>

    @if ($errors->any())
        <div class="error">
            <h3>Erros de validação:</h3>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <form action="/clientes" method="POST">
        @csrf

        <label>Nome:</label>
        <input type="text" name="nome" value="{{ old('nome') }}" required>

        <label>CPF (11 dígitos):</label>
        <input type="text" name="cpf" value="{{ old('cpf') }}" placeholder="12345678901" required>

        <label>Data de nascimento:</label>
        <input type="date" name="data_nascimento" value="{{ old('data_nascimento') }}" required>

        <label>Telefone:</label>
        <input type="text" name="telefone" value="{{ old('telefone') }}">

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
