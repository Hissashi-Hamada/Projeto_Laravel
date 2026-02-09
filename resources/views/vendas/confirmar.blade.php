@extends('layouts.app')

@section('title', 'Confirmar Venda')

@section('content')
    <div class="page-confirmar-venda py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">

                    <div class="card shadow-sm border-2 overflow-hidden">
                        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-0">Confirmar venda</h5>
                                <small class="text-white-50">Produto: {{ $produto->nome }}</small>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="row g-4 align-items-start">

                                <div class="col-12 col-md-5">
                                    @if (!empty($produto->imagem))
                                        <img src="{{ asset('storage/' . $produto->imagem) }}" alt="Imagem do produto"
                                            class="img-fluid rounded w-100 produto-img">
                                    @else
                                        <div
                                            class="produto-img-placeholder rounded w-100 d-flex align-items-center justify-content-center">
                                            <span class="text-muted">Sem imagem</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-12 col-md-7">
                                    <h4 class="mb-2">{{ $produto->nome }}</h4>

                                    <p class="text-muted mb-3">
                                        {{ $produto->descricao ?? 'Sem descrição cadastrada.' }}
                                    </p>

                                    <ul class="list-group list-group-flush mb-4">
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="text-muted">Preço</span>
                                            <strong>R$ {{ number_format($produto->valor, 2, ',', '.') }}</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="text-muted">Quantidade</span>
                                            <strong>{{ $produto->quantidade ?? 1 }}</strong>
                                        </li>
                                    </ul>

                                    <form method="POST" action="{{ route('vendas.confirmar', $produto->id) }}"
                                        class="d-grid gap-2 d-sm-flex">
                                        @csrf
                                        <button type="button" class="btn btn-primary btn-lg flex-fill"
                                            data-bs-toggle="modal" data-bs-target="#modalConfirmarVenda{{ $produto->id }}">
                                            Confirmar venda
                                        </button>

                                        <div class="modal fade" id="modalConfirmarVenda{{ $produto->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            ...
                                            <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                                            ...
                                        </div>

                                        <a href="{{ route('vendas.index') }}"
                                            class="btn btn-outline-secondary btn-lg flex-fill">
                                            Voltar
                                        </a>
                                    </form>

                                    <small class="text-muted d-block mt-3">
                                        Ao confirmar, você finaliza a venda deste produto.
                                    </small>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
