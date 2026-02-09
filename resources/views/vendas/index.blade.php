@extends('layouts.app')

@section('title', 'Produtos')

@push('styles')
    <style>
        .product-card {
            transition: transform .15s ease, box-shadow .15s ease;
        }

        .product-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 .75rem 1.5rem rgba(0, 0, 0, .12) !important;
        }

        .product-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    </style>
@endpush

@section('content')
    <div class="container py-5">

        <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0">Produtos</h1>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

            @forelse ($produtos as $produto)
                @php
                    // Se você já tem campo status booleano, use:
                    // $emEstoque = (bool)($produto->status ?? false);

                    // Se o estoque depende da quantidade, use:
                    $emEstoque = (int) ($produto->quantidade ?? 0) > 0;
                @endphp

                <div class="col">
                    <div class="card product-card h-100 border-2 shadow-sm rounded-4 overflow-hidden">

                        <div class="ratio ratio-4x3 bg-dark card border-dark mb-3">
                            @if (!empty($produto->imagem))
                                <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}"
                                    class="product-img">
                            @else
                                <div class="d-flex align-items-center justify-content-center text-muted small">
                                    Sem imagem
                                </div>
                            @endif
                        </div>

                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-start gap-2 mb-2">
                                <h2 class="h6 mb-0 text-truncate" title="{{ $produto->nome }}">
                                    {{ $produto->nome }}
                                </h2>

                                <span class="badge {{ $produto->status ? 'text-bg-success' : 'text-bg-danger' }}">
                                    {{ $produto->status ? 'Em estoque' : 'Sem estoque' }}
                                </span>
                            </div>

                            <div class="text-muted small mb-3">
                                Quantidade: <strong>{{ $produto->quantidade ?? 0 }}</strong>
                            </div>

                            <div class="mt-auto d-flex align-items-center justify-content-between">
                                <div class="fs-5 fw-semibold">
                                    R$ {{ number_format($produto->valor, 2, ',', '.') }}
                                </div>
                                @if (!$produto->status || (int) ($produto->quantidade ?? 0) <= 0)

                                    <button type="button" class="btn btn-success btn-sm px-3" disabled>
                                        Confirmar compra
                                    </button>
                                @else
                                    <a href="{{ route('vendas.confirmar', ['produto_id' => $produto->id]) }}"
                                        class="btn btn-success btn-sm px-3">
                                        Confirmar compra
                                    </a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info mb-0">Nenhum produto cadastrado.</div>
                </div>
            @endforelse

        </div>
    </div>
@endsection
