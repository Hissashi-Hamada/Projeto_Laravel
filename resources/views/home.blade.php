<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Gestão</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        .menu {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        .menu-item {
            background: #007bff;
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-decoration: none;
            text-align: center;
            min-width: 200px;
            transition: background-color 0.3s;
        }
        .menu-item:hover {
            background: #0056b3;
            color: white;
        }
        .menu-item h3 {
            margin: 0 0 10px 0;
            font-size: 18px;
        }
        .menu-item p {
            margin: 0;
            font-size: 14px;
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistema de Gestão</h1>

        <div class="menu">
            <a href="{{ route('clientes.index') }}" class="menu-item">
                <h3>📋 Gerenciar Clientes</h3>
                <p>Cadastrar, editar e visualizar clientes</p>
            </a>

            <a href="{{ route('produtos.index') }}" class="menu-item">
                <h3>📦 Gerenciar Produtos</h3>
                <p>Cadastrar, editar e visualizar produtos</p>
            </a>
        </div>
    </div>
</body>
</html>