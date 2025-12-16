<!DOCTYPE html>
<html>
<head>
    <title>Detalhes do Produto</title>
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
        .status { padding: 4px 8px; border-radius: 4px; font-size: 14px; font-weight: bold; }
        .status-ativo { background-color: #d4edda; color: #155724; }
        .status-inativo { background-color: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <h1>Detalhes do Produto</h1>

    <div class="detail">
        <span class="label">ID:</span> {{ $produto->id }}
    </div>

    <div class="detail">
        <span class="label">Nome:</span> {{ $produto->nome }}
    </div>

    <div class="detail">
        <span class="label">Descrição:</span> {{ $produto->descricao ?? '-' }}
    </div>

    <div class="detail">
        <span class="label">Valor:</span> R$ {{ number_format($produto->valor, 2, ',', '.') }}
    </div>

    <div class="detail">
        <span class="label">Quantidade:</span> {{ $produto->quantidade }}
    </div>

    <div class="detail">
        <span class="label">Status:</span>
        <span class="status {{ $produto->status ? 'status-ativo' : 'status-inativo' }}">
            {{ $produto->status ? 'Ativo' : 'Inativo' }}
        </span>
    </div>

    <div class="detail">
        <span class="label">Criado em:</span> {{ $produto->created_at->format('d/m/Y H:i') }}
    </div>

    <div class="detail">
        <span class="label">Última atualização:</span> {{ $produto->updated_at->format('d/m/Y H:i') }}
    </div>

    <br>

    <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Voltar para Lista</a>
    <a href="{{ route('produtos.edit', $produto) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('produtos.destroy', $produto) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</button>
    </form>
</body>
</html>