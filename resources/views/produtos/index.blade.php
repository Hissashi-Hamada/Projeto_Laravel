<!DOCTYPE html>
<html>
<head>
    <title>Lista de Produtos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        .success { color: green; margin: 10px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        .btn { padding: 8px 16px; text-decoration: none; border-radius: 4px; margin: 2px; display: inline-block; }
        .btn-primary { background-color: #007bff; color: white; }
        .btn-warning { background-color: #ffc107; color: black; }
        .btn-danger { background-color: #dc3545; color: white; }
        .btn:hover { opacity: 0.8; }
        .actions { white-space: nowrap; }
        .status { padding: 4px 8px; border-radius: 4px; font-size: 12px; }
        .status-ativo { background-color: #d4edda; color: #155724; }
        .status-inativo { background-color: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <h1>Lista de Produtos</h1>

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('produtos.create') }}" class="btn btn-primary">Adicionar Novo Produto</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Quantidade</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->descricao ?? '-' }}</td>
                    <td>R$ {{ number_format($produto->valor, 2, ',', '.') }}</td>
                    <td>{{ $produto->quantidade }}</td>
                    <td>
                        <span class="status {{ $produto->status ? 'status-ativo' : 'status-inativo' }}">
                            {{ $produto->status ? 'Ativo' : 'Inativo' }}
                        </span>
                    </td>
                    <td class="actions">
                        <a href="{{ route('produtos.show', $produto) }}" class="btn btn-primary">Ver</a>
                        <a href="{{ route('produtos.edit', $produto) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('produtos.destroy', $produto) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">Nenhum produto cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>