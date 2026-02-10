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

                                    <!-- Botão para acionar o modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#meuModal">
                                        Abrir Modal
                                    </button>

                                    <!-- Estrutura do Modal -->
                                    <div class="modal fade" id="meuModal" tabindex="-1" aria-labelledby="meuModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content border-0 shadow-lg">

                                                <div class="modal-header bg-dark text-white p-4">
                                                    <h5 class="modal-title fw-bold" id="meuModalLabel">
                                                        <i class="bi bi-credit-card-2-back me-2"></i> Finalizar Pagamento
                                                    </h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body p-4">
                                                    <form id="form-checkout">
                                                        <h6 class="text-uppercase text-muted fw-bold mb-3"
                                                            style="font-size: 0.8rem; letter-spacing: 1px;">Informações do
                                                            Cliente</h6>
                                                        <div class="row g-3 mb-4">
                                                            <div class="col-md-6">
                                                                <label for="nome_cliente"
                                                                    class="form-label small fw-bold">Nome do Cliente</label>
                                                                <input id="nome_cliente" type="text" name="nome_cliente"
                                                                    class="form-control" placeholder="Ex: João Silva"
                                                                    value="{{ old('nome_cliente') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="email"
                                                                    class="form-label small fw-bold">E-mail de
                                                                    Contato</label>
                                                                <input id="email" type="email" name="email"
                                                                    class="form-control" placeholder="@email.com"
                                                                    value="{{ old('email') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="telefone"
                                                                    class="form-label small fw-bold">Número de
                                                                    Telefone</label>
                                                                <input id="telefone" type="tel" name="telefone"
                                                                    class="form-control" placeholder="(00) 00000-0000"
                                                                    value="{{ old('numero_cartao') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="data_nascimento"
                                                                    class="form-label small fw-bold">Data de
                                                                    Nascimento</label>
                                                                <input id="data_nascimento" type="date"
                                                                    name="data_nascimento" class="form-control"
                                                                    value="{{ old('data_nascimento') }}">
                                                            </div>
                                                        </div>

                                                        <hr class="my-4 text-muted">

                                                        <h6 class="text-uppercase text-muted fw-bold mb-3"
                                                            style="font-size: 0.8rem; letter-spacing: 1px;">Dados do Cartão
                                                        </h6>
                                                        <div class="row g-3">
                                                            <div class="col-12">
                                                                <label for="nome_cartao"
                                                                    class="form-label small fw-bold">Nome Impresso no
                                                                    Cartão</label>
                                                                <input id="nome_cartao" type="text" name="nome_cartao"
                                                                    class="form-control" placeholder="COMO ESTÁ NO CARTÃO"
                                                                    value="{{ old('nome_cartao') }}">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <label for="numero_cartao"
                                                                    class="form-label small fw-bold">Número do
                                                                    Cartão</label>
                                                                <input id="numero_cartao" type="text"
                                                                    name="numero_cartao" class="form-control"
                                                                    placeholder="0000 0000 0000 0000"
                                                                    value="{{ old('numero_cartao') }}">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="cpf" class="form-label small fw-bold">CPF
                                                                    do Titular</label>
                                                                <input id="cpf" type="text" name="cpf"
                                                                    class="form-control" placeholder="000.000.000-00"
                                                                    maxlength="14" value="{{ old('cpf') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="data_vencimento"
                                                                    class="form-label small fw-bold">Vencimento</label>
                                                                <input id="data_vencimento" type="month"
                                                                    name="data_vencimento" class="form-control"
                                                                    value="{{ old('data_vencimento') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="codigo_seguranca"
                                                                    class="form-label small fw-bold">CVC/CVV</label>
                                                                <input id="codigo_seguranca" type="text"
                                                                    name="codigo_seguranca" class="form-control"
                                                                    placeholder="123" maxlength="4"
                                                                    value="{{ old('codigo_seguranca') }}">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="modal-footer border-0 p-4">
                                                    <button type="button" class="btn btn-outline-secondary px-4"
                                                        data-bs-dismiss="modal">Voltar</button>
                                                    <button type="button"
                                                        class="btn btn-success px-5 fw-bold shadow-sm">Confirmar
                                                        Compra</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


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
