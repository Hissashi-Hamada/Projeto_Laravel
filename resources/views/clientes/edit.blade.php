<!DOCTYPE html>
<html>
<head>
    <title>Editar Cliente</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        .error { color: red; margin: 10px 0; }
        form { margin-top: 20px; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input { padding: 5px; width: 300px; }
        button { padding: 10px 20px; margin-top: 20px; }
        .btn-primary { background-color: #007bff; color: white; border: none; border-radius: 4px; }
        .btn-secondary { background-color: #6c757d; color: white; border: none; border-radius: 4px; margin-left: 10px; }
        .btn:hover { opacity: 0.8; }
    </style>
</head>
<body>
    <h1>Editar Cliente</h1>

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

    <form action="{{ route('clientes.update', $cliente) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome:</label>
        <input type="text" name="nome" value="{{ old('nome', $cliente->nome) }}" required>

        <label>CPF (11 dígitos):</label>
        <input type="text" name="cpf" value="{{ old('cpf', $cliente->cpf) }}" placeholder="12345678901" required>

        <label>Data de nascimento:</label>
        <input type="date" name="data_nascimento" value="{{ old('data_nascimento', $cliente->data_nascimento->format('Y-m-d')) }}" required>

        <label>Telefone:</label>
        <input type="text" name="telefone" value="{{ old('telefone', $cliente->telefone) }}">

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $cliente->email) }}" required>

        <button type="submit" class="btn-primary">Atualizar</button>
        <a href="{{ route('clientes.index') }}" class="btn-secondary">Voltar</a>
    </form>
</body>
</html>