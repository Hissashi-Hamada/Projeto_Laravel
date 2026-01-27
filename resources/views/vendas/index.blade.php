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
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6">

                <div class="card bg-white text-dark shadow-sm border-0">
                    <div class="card-body">

                        <h2 class="card-title mb-3">Produto</h2>

                        <img
                            src=""
                            alt="Imagem do produto"
                            class="img-fluid rounded mb-3"
                        >

                        <p class="card-text mb-3">Descrição</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold fs-5">Preço</span>
                            <button type="button" class="btn btn-primary">
                                Vender
                            </button>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-12 col-sm-10 col-md-8 col-lg-6">

                <div class="card bg-white text-dark shadow-sm border-0">
                    <div class="card-body">

                        <h2 class="card-title mb-3">Produto</h2>

                        <img
                            src=""
                            alt="Imagem do produto"
                            class="img-fluid rounded mb-3"
                        >

                        <p class="card-text mb-3">Descrição</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold fs-5">Preço</span>
                            <button type="button" class="btn btn-primary">
                                Vender
                            </button>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</body>
</html>
