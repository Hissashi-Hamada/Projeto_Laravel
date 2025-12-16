<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>CRUD Clientes e Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">CRUD Laravel</a>
        <div>
            <a href="{{ route('clientes.index') }}" class="btn btn-outline-light btn-sm">Clientes</a>
            <a href="{{ route('produtos.index') }}" class="btn btn-outline-light btn-sm">Produtos</a>
        </div>
    </div>
</nav>


<div class="container">
    @yield('content')
</div>

</body>
</html>
