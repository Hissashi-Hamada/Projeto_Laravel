<!DOCTYPE html>
<html>
<head>
    <title>Detalhes do Cliente</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        .detail { margin: 10px 0; }
        .label { font-weight: bold; }
        .btn { padding: 8px 16px; text-decoration: none; border-radius: 4px; margin: 5px; display: inline-block; }
        .btn-primary { background-color: #007bff; color: white; }
        .btn-warning { background-color: #ffc107; color: black; }
        .btn-danger { background-color: #dc3545; color: white; }
        .btn-secondary { background-color: #6c757d; color: white; }
        .btn:hover { opacity: 0.8; }
    </style>
</head>
<body>
    <h1>Detalhes do Cliente</h1>

    <div class="detail">
        <span class="label">ID:</span> {{ $cliente->id }}
    </div>

    <div class="detail">
        <span class="label">Nome:</span> {{ $cliente->nome }}
    </div>

    <div class="detail">
        <span class="label">CPF:</span> {{ $cliente->cpf }}
    </div>

    <div class="detail">
        <span class="label">Data de Nascimento:</span> {{ $cliente->data_nascimento->format('d/m/Y') }}
    </div>

    <div class="detail">
        <span class="label">Telefone:</span> {{ $cliente->telefone ?? '-' }}
    </div>

    <div class="detail">
        <span class="label">Email:</span> {{ $cliente->email }}
    </div>

    <div class="detail">
        <span class="label">Criado em:</span> {{ $cliente->created_at->format('d/m/Y H:i') }}
    </div>

    <div class="detail">
        <span class="label">Última atualização:</span> {{ $cliente->updated_at->format('d/m/Y H:i') }}
    </div>

    <br>

    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar para Lista</a>
    <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">Excluir</button>
    </form>
</body>
</html>