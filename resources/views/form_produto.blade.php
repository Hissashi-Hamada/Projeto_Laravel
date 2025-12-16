<!DOCTYPE html>
<html>
<head>
    <title>Teste Produtos</title>
</head>
<body>
    <h1>Adicionar Produto</h1>

    <form method="POST" action="/api/produtos">
        @csrf
        <label>Nome:</label>
        <input type="text" name="nome"><br><br>

        <label>Descrição:</label>
        <textarea name="descricao"></textarea><br><br>

        <label>Valor:</label>
        <input type="number" step="0.01" name="valor"><br><br>

        <label>Quantidade:</label>
        <input type="number" name="quantidade"><br><br>

        <label>Status (1 ativo / 0 inativo):</label>
        <input type="number" name="status" value="1"><br><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
