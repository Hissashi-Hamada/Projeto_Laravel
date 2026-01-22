@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Vendas')</title>


    @yield('styles')
</head>
<body>

    

    <script>
        (function(){
            const body = document.body;
            const toggle = document.querySelector('[data-drawer-toggle]');
            const closes = document.querySelectorAll('[data-drawer-close]');

            function openDrawer(){ body.classList.add('drawer-open'); }
            function closeDrawer(){ body.classList.remove('drawer-open'); }

            toggle?.addEventListener('click', () => {
                body.classList.contains('drawer-open') ? closeDrawer() : openDrawer();
            });

            closes.forEach(el => el.addEventListener('click', closeDrawer));

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') closeDrawer();
            });
        })();
    </script>

    @yield('scripts')
</body>
</html>
