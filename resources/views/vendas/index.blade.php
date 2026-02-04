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

                        <h2 class="card-title mb-3">
                            <strong>{{ $produto->nome }}</strong>
                        </h2>

                        {{-- Imagem do produto (se existir) --}}
                        @if (!empty($produto->imagem))
                            <img
                                src="{{ asset('storage/' . $produto->imagem) }}"
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
                            </span>

                            {{-- Botão que abre o modal --}}
                            <button
                                type="button"
                                class="btn btn-success"
                                data-bs-toggle="modal"
                                data-bs-target="#modalVender{{ $produto->id }}"
                            >
                                Comprar
                            </button>
                        </div>

                    </div>
                </div>

                {{-- MODAL --}}
                <div class="modal fade" id="modalVender{{ $produto->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Vender: {{ $produto->nome }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                            </div>

                            <div class="modal-body">
                                <div class="row g-3 align-items-start">

                                    <div class="col-12 col-md-5">
                                        @if (!empty($produto->imagem))
                                            <img
                                                src="{{ asset('storage/' . $produto->imagem) }}"
                                                alt="Imagem do produto"
                                                class="img-fluid rounded"
                                            >
                                        @else
                                            <div class="alert alert-warning mb-0">
                                                Este produto não possui imagem cadastrada.
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-12 col-md-7">
                                        <p class="mb-2"><strong>Descrição:</strong></p>
                                        <p class="mb-3">
                                            {{ $produto->descricao ?? 'Sem descrição cadastrada.' }}
                                        </p>

                                        <p class="mb-1"><strong>Preço:</strong> R$ {{ number_format($produto->valor, 2, ',', '.') }}</p>
                                        <p class="mb-1"><strong>Quantidade:</strong> {{ $produto->quantidade ?? 1 }}</p>
                                        <p class="mb-0"><strong>Status:</strong> {{ ($produto->status ?? false) ? 'em estoque' : 'fora de estoque' }}</p>
                                    </div>

                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Cancelar
                                </button>

                                {{-- Se você quiser confirmar a venda --}}
                                <a href="{{ route('vendas.index', ['produto_id' => $produto->id]) }}" class="btn btn-primary">
                                    Confirmar Compra
                                </a>
                            </div>

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
