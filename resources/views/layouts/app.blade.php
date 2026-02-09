<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">

    <title>@yield('title', 'CRUD Laravel')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">


    {{-- CSS GLOBAL --}}
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            margin: 0;
            background: #f1f5f9;
        }

        /* HEADER */
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

        /* CONTEÚDO */
        main {
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
        }

        h2 {
            margin-bottom: 25px;
            color: #0f172a;
        }

        /* FORMULÁRIOS */
        .form-grid {
            display: grid;

            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .full {
            margin-bottom: 20px;
            grid-column: 1 / -1;
        }

        label {
            font-size: 14px;
            margin-bottom: 6px;
            color: #334155;
        }

        input,
        textarea,
        select {
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #cbd5e1;
            font-size: 14px;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #2563eb;
        }

        textarea {
            resize: vertical;
        }

        /* TABELAS */
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

        /* AÇÕES */
        .actions {
            display: flex;
            gap: 8px;
        }

        .actions a,
        .actions button {
            padding: 6px 10px;
            border-radius: 6px;
            font-size: 13px;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        .actions .edit {
            background: #2563eb;
            color: #fff;
        }

        .actions .delete {
            background: #dc2626;
            color: #fff;
        }

        :root {
            --bg: #0b1220;
            --panel: #111a2e;
            --text: #e7eaf0;
            --muted: #a7b0c0;
            --border: rgba(255, 255, 255, .08);
            --shadow: 0 10px 30px rgba(0, 0, 0, .35);
            --radius: 14px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
            background: linear-gradient(180deg, #070b14, #0b1220);
            color: var(--text);
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 50;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 16px;
            background: rgba(17, 26, 46, .92);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border);
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 220px;
        }

        .brand {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }

        .brand strong {
            font-size: 14px;
        }

        .brand span {
            font-size: 12px;
            color: var(--muted);
        }

        .icon-btn {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            border: 1px solid var(--border);
            background: rgba(255, 255, 255, .04);
            color: var(--text);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .icon-btn:hover {
            background: rgba(255, 255, 255, .07);
        }

        .hamburger {
            width: 18px;
            height: 14px;
            position: relative;
        }

        .hamburger span {
            position: absolute;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--text);
            border-radius: 2px;
            transition: transform .2s ease, top .2s ease, opacity .2s ease;
        }

        .hamburger span:nth-child(1) {
            top: 0;
        }

        .hamburger span:nth-child(2) {
            top: 6px;
        }

        .hamburger span:nth-child(3) {
            top: 12px;
        }

        .topnav {
            display: flex;
        }

        .topnav a {
            text-decoration: none;
            color: var(--text);
            padding: 10px 12px;
            border-radius: 12px;
            border: 1px solid transparent;
            white-space: nowrap;
            font-size: 14px;
        }

        .topnav a:hover {
            border-color: var(--border);
            background: rgba(255, 255, 255, .04);
        }

        .topbar-center {
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 220px;
            justify-content: flex-end;
        }

        .search {
            width: 220px;
            max-width: 40vw;
            padding: 10px 12px;
            border-radius: 12px;
            border: 1px solid var(--border);
            background: rgba(255, 255, 255, .04);
            color: var(--text);
            outline: none;
        }

        .search::placeholder {
            color: var(--muted);
        }

        .page {
            max-width: 1200px;
            margin: 18px auto;
            padding: 0 16px;
        }

        .drawer-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .55);
            opacity: 0;
            pointer-events: none;
            transition: opacity .2s ease;
            z-index: 80;
        }

        .drawer {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 290px;
            background: rgba(17, 26, 46, .98);
            border-right: 1px solid var(--border);
            box-shadow: var(--shadow);
            transform: translateX(-100%);
            transition: transform .22s ease;
            z-index: 90;
            padding: 14px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .drawer header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 6px 4px 12px;
            border-bottom: 1px solid var(--border);
        }

        .drawer a {
            color: var(--text);
            text-decoration: none;
            padding: 10px 12px;
            border-radius: 12px;
            border: 1px solid transparent;
        }

        .drawer a:hover {
            border-color: var(--border);
            background: rgba(255, 255, 255, .04);
        }

        body.drawer-open .drawer-overlay {
            opacity: 1;
            pointer-events: auto;
        }

        body.drawer-open .drawer {
            transform: translateX(0);
        }

        body.drawer-open .hamburger span:nth-child(1) {
            top: 6px;
            transform: rotate(45deg);
        }

        body.drawer-open .hamburger span:nth-child(2) {
            opacity: 0;
        }

        body.drawer-open .hamburger span:nth-child(3) {
            top: 6px;
            transform: rotate(-45deg);
        }

        @media (max-width: 860px) {
            .topnav {
                display: none;
            }

            .search {
                display: none;
            }

            .topbar-left {
                min-width: auto;
            }

            .topbar-center {
                min-width: auto;
            }
        }

        .card {
            background: rgba(255, 255, 255, .04);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 16px;
        }
    </style>

    {{-- VITE --}}
    @vite(['resources/js/app.js', 'resources/css/app.css'])

    {{-- STYLES EXTRAS --}}
    @stack('styles')
    @php
        $userType = auth()->user()->user_type ?? null;
        $isAdmin = $userType === 'admin';
        $isVendedor = $userType === 'vendedor';
        $canManage = $isAdmin || $isVendedor; // pode ver menus de gestão
    @endphp

    <div class="drawer-overlay" data-drawer-close></div>

    <aside class="drawer" aria-label="Menu lateral">
        <header>
            <div class="brand">
                <strong>Menu</strong>
                <span>Navegação</span>
            </div>
            <button class="icon-btn" type="button" data-drawer-close aria-label="Fechar menu">
                X
            </button>
        </header>

        @if ($canManage)
            <a href="{{ route('vendas.index') }}">Vendas</a>
            <a href="{{ route('clientes.index') }}">Clientes</a>
            <a href="{{ route('produtos.index') }}">Produtos</a>
        @endif

        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
    </aside>

    <header class="topbar">
        <div class="topbar-left">
            <button class="icon-btn" type="button" data-drawer-toggle aria-label="Abrir menu">
                <div class="hamburger" aria-hidden="true">
                    <span></span><span></span><span></span>
                </div>
            </button>

            <div class="brand">
                <strong>projeto de laravel</strong>
            </div>
        </div>


        <div class="topbar-center">
            <input class="search" type="search" placeholder="Buscar...">
        </div>
    </header>

    <main class="page">
        @yield('content')
    </main>

    {{-- BOOTSTRAP JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

    {{-- SWEETALERT --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sucesso',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: 'Verifique os campos do formulário.',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
</head>

<body>

    <script>
        (function() {
            const body = document.body;
            const toggle = document.querySelector('[data-drawer-toggle]');
            const closes = document.querySelectorAll('[data-drawer-close]');

            function openDrawer() {
                body.classList.add('drawer-open');
            }

            function closeDrawer() {
                body.classList.remove('drawer-open');
            }

            toggle?.addEventListener('click', () => {
                body.classList.contains('drawer-open') ? closeDrawer() : openDrawer();
            });

            closes.forEach(el => el.addEventListener('click', closeDrawer));

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') closeDrawer();
            });
        })();
    </script>

    {{-- SCRIPTS EXTRAS (use @push('scripts') nas views) --}}
    @stack('scripts')
</body>

</html>
