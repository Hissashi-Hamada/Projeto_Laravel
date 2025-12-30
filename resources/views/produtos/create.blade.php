@extends('layouts.app')

@section('title', 'Novo Produto')

@section('content')
<div class="container">

    <h2 class="mb-4">Novo Produto</h2>

    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf

        <div class="form-grid">

            {{-- NOME --}}
            <div class="form-group full">
                <label for="nome">Nome do Produto</label>
                <input
                    id="nome"
                    type="text"
                    name="nome"
                    class="form-control"
                    value="{{ old('nome') }}"
                    required
                >
            </div>

            {{-- DESCRIÇÃO --}}
            <div class="form-group full">
                <label for="descricao">Descrição</label>
                <textarea
                    id="descricao"
                    name="descricao"
                    rows="3"
                    maxlength="50"
                    class="form-control"
                >{{ old('descricao') }}</textarea>
            </div>

            {{-- PREÇO --}}
            <div class="form-group">
                <label for="valor">Preço (R$)</label>
                <input
                    id="valor"
                    type="text"
                    name="valor"
                    class="form-control"
                    value="{{ old('valor', isset($produto) ? number_format($produto->valor, 2, ',', '.') : '') }}"
                    required
                >
            </div>

            {{-- QUANTIDADE --}}
            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input
                    id="quantidade"
                    type="number"
                    name="quantidade"
                    class="form-control"
                    value="{{ old('quantidade') }}"
                    required
                >
            </div>

            {{-- STATUS --}}
            <div class="form-group">
                <label for="status">Status</label>
                <select
                    id="status"
                    name="status"
                    class="form-control"
                    required
                >
                    <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>
                        Ativo
                    </option>
                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>
                        Inativo
                    </option>
                </select>
            </div>

            {{-- AÇÕES --}}
            <div class="full actions mt-3">
                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Salvar
                </button>

                <a
                    href="{{ route('produtos.index') }}"
                    class="btn btn-secondary"
                >
                    Voltar
                </a>
            </div>

        </div>
    </form>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('valor');

    if (!input) return;

    input.addEventListener('input', function () {
        let valor = input.value;

        // remove tudo que não for número
        valor = valor.replace(/\D/g, '');

        // transforma em centavos
        valor = (valor / 100).toFixed(2);

        // troca ponto por vírgula
        valor = valor.replace('.', ',');

        // adiciona separador de milhar
        valor = valor.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

        input.value = valor;
    });

    // antes de enviar o formulário
    input.form.addEventListener('submit', function () {
        let valor = input.value;

        // remove pontos
        valor = valor.replace(/\./g, '');

        // troca vírgula por ponto
        valor = valor.replace(',', '.');

        input.value = valor;
    });
});
</script>

@endsection
