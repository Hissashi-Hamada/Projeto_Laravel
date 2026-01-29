@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Vendas')</title>
    </head>
<body>
    <div class="container py-4">
    <div class="row justify-content-center g-3">

        @forelse ($produtos as $produto)
            <div class="col-12 col-sm-10 col-md-8 col-lg-6">

                <div class="card bg-white text-dark shadow-sm border-0">
                    <div class="card-body">

                        <h2 class="card-title mb-3"><Strong>{{ $produto->nome }}</Strong></h2>

                        {{-- Se você tiver imagem (ex: produto da produto) --}}
                        @if (!empty($produto->produto->imagem))
                            <img
                                src="{{ asset('storage/'.$produto->produto->imagem) }}"
                                alt="Imagem do produto"
                                class="img-fluid rounded mb-3"
                            >
                        @endif

                        <p class="card-text mb-3">

                            <strong>quantidade:</strong> {{ $produto->quantidade ?? 1 }} <br>
                            <strong>status:</strong> {{ ($produto->status ?? false) ? 'em estoque' : 'fora de estoque' }}
                        </p>

                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold fs-5">
                                R$ {{ number_format($produto->valor, 2, ',', '.') }}

                            {{-- Ajuste a rota/ação do seu projeto --}}
                            <button>
                                <a href="{{ route('vendas.index', ['produto_id' => $produto->id]) }}" class="btn btn-success">
                                    Vender
                                </a>
                            </button>
                        </div>

                    </div>
                </div>

            </div>
        @empty
            <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                <div class="alert alert-info mb-0">Nenhuma produto cadastrada.</div>
            </div>
        @endforelse

    </div>
</div>
</body>
</html>
@endsection
