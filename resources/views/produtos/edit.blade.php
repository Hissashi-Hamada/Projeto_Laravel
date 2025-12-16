<!DOCTYPE html>
<html>
<head>
    <title>Editar Produto</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        .error { color: red; margin: 10px 0; }
        form { margin-top: 20px; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input, textarea { padding: 5px; width: 300px; }
        textarea { height: 80px; resize: vertical; }
        button { padding: 10px 20px; margin-top: 20px; }
        .btn-primary { background-color: #007bff; color: white; border: none; border-radius: 4px; }
        .btn-secondary { background-color: #6c757d; color: white; border: none; border-radius: 4px; margin-left: 10px; }
        .btn:hover { opacity: 0.8; }
        .checkbox-group { margin-top: 15px; }
    </style>
</head>
<body>
    <h1>Editar Produto</h1>

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

    <form action="{{ route('produtos.update', $produto) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome:</label>
        <input type="text" name="nome" value="{{ old('nome', $produto->nome) }}" required>

        <label>Descrição:</label>
        <textarea name="descricao">{{ old('descricao', $produto->descricao) }}</textarea>

        <label>Valor (R$):</label>
        <input type="number" name="valor" value="{{ old('valor', $produto->valor) }}" step="0.01" min="0" required>

        <label>Quantidade:</label>
        <input type="number" name="quantidade" value="{{ old('quantidade', $produto->quantidade) }}" min="0" required>

        <div class="checkbox-group">
            <label>
                <input type="checkbox" name="status" value="1" {{ old('status', $produto->status) ? 'checked' : '' }}>
                Produto ativo
            </label>
        </div>

        <button type="submit" class="btn-primary">Atualizar</button>
        <a href="{{ route('produtos.index') }}" class="btn-secondary">Voltar</a>
    </form>
</body>
</html>