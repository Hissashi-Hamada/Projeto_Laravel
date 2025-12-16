<!DOCTYPE html>
<html>
<head>
    <title>Lista de Clientes</title>
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
    </style>
</head>
<body>
    <h1>Lista de Clientes</h1>

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('clientes.create') }}" class="btn btn-primary">Adicionar Novo Cliente</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Data de Nascimento</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->cpf }}</td>
                    {{ \Carbon\Carbon::parse($cliente->data_nascimento)->format('d/m/Y') }}
                    <td>{{ $cliente->telefone ?? '-' }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td class="actions">
                        <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-primary">Ver</a>
                        <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">Nenhum cliente cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>