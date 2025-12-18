<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'CRUD Laravel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            margin: 0;
            background: #f1f5f9;
        }

        header {
            background: #0f172a;
            color: #fff;
            padding: 16px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-size: 20px;
            margin: 0;
        }

        header nav a {
            color: #fff;
            text-decoration: none;
            margin-left: 15px;
            padding: 6px 14px;
            border: 1px solid #fff;
            border-radius: 6px;
            font-size: 14px;
        }

        header nav a:hover {
            background: #2563eb;
            border-color: #2563eb;
        }

        main {
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,.08);
        }

        h2 {
            margin-bottom: 25px;
            color: #0f172a;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 14px;
            margin-bottom: 6px;
            color: #334155;
        }

        input {
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #cbd5e1;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
        }

        .full {
            grid-column: 1 / -1;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            background: #0f172a;
            color: #fff;
        }

        thead th {
            padding: 14px 12px;
            font-size: 14px;
            text-align: left;
            white-space: nowrap;
        }

        tbody td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
            color: #334155;
            white-space: nowrap;
        }

        tbody tr:hover {
            background: #f1f5f9;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .actions a,
        .actions button {
            padding: 6px 10px;
            border-radius: 6px;
            font-size: 13px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .actions .edit {
            background: #2563eb;
            color: #fff;
        }

        .actions .delete {
            background: #dc2626;
            color: #fff;
        }

        textarea,
            select {
                padding: 12px;
                border-radius: 6px;
                border: 1px solid #cbd5e1;
                font-size: 14px;
                resize: vertical;
            }

            textarea:focus,
            select:focus {
                outline: none;
                border-color: #2563eb;
            }      
    </style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>

<header>
    <h1 class="titulo">CRUD Laravel</h1>
    <nav>
        <a href="{{ route('clientes.index') }}">Clientes</a>
        <a href="{{ route('produtos.index') }}">Produtos</a>
    </nav>
</header>

<main>
    @yield('content')
</main>

</body>
</script>
</html>
