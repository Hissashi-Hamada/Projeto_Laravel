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
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div
                                                    class="modal-header bg-dark text-white d-flex justify-content-between align-items-center">
                                                    <h5 class="modal-title" id="meuModalLabel">Forma de pagamento em cartão
                                                    </h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="form-group mb-3">
                                                        <label for="nome_cliente">Nome do cliente</label>
                                                        <input id="nome_cliente" type="text" name="nome_cliente"
                                                            class="form-control" value="{{ old('nome_cliente') }}">
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="email">Email</label>
                                                        <input id="email" type="email" name="email"
                                                            class="form-control" value="{{ old('email') }}">
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="numero_cartao">Numero de telefone</label>
                                                        <input id="numero_cartao" type="number" name="numero_cartao"
                                                            class="form-control" value="{{ old('numero_cartao') }}">
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="data_nascimento">Data de Nascimento</label>
                                                        <input id="data_nascimento" type="date" name="data_nascimento"
                                                            class="form-control" value="{{ old('data_nascimento') }}">
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="nome_sobrenome">Nome e Sobrenome</label>
                                                        <input id="nome_sobrenome" type="text" name="nome_sobrenome"
                                                            class="form-control" value="{{ old('nome_sobrenome') }}">
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="nome_cartao">Nome no Cartão</label>
                                                        <input id="nome_cartao" type="text" name="nome_cartao"
                                                            class="form-control" value="{{ old('nome_cartao') }}">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="numero_cartao">Numero no Cartão</label>
                                                        <input id="numero_cartao" type="numeric" name="numero_cartao"
                                                            class="form-control" value="{{ old('numero_cartao') }}">
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="data_vencimento">Data de Vencimento</label>
                                                        <input id="data_vencimento" type="month" name="data_vencimento"
                                                            class="form-control" value="{{ old('data_vencimento') }}">
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="codigo_seguranca">Código de Segurança</label>
                                                        <input id="codigo_seguranca" type="text"
                                                            name="codigo_seguranca" class="form-control"
                                                            inputmode="numeric" maxlength="4"
                                                            value="{{ old('codigo_seguranca') }}">
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="cpf">CPF do Titular</label>
                                                        <input id="cpf" type="text" name="cpf"
                                                            class="form-control" inputmode="numeric" maxlength="14"
                                                            value="{{ old('cpf') }}">
                                                    </div>

                                                </div>

                                                <div class="modal-footer d-flex justify-content-end">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Fechar</button>
                                                    <button type="button" class="btn btn-primary">Salvar</button>
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
