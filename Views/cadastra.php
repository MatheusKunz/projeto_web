<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Carro</title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
</head>

<body>
    <?php require_once 'includes/menu.php'; ?>
    <div class="conteiner">
        <h2>Cadastro de Novo Carro</h2><br>

        <form action="../Services/processaCadastro.php" method="post">

            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" required>

            <label for="modelo">Modelo:</label>
            <input type="text" id="modelo" name="modelo" required>

            <label for="ano">Ano:</label>
            <input type="number" id="ano" name="ano" required>

            <label for="cor">Cor:</label>
            <input type="text" id="cor" name="cor">

            <label for="placa">Placa:</label>
            <input type="text" id="placa" name="placa" required>

            <label for="preco">Preço:</label>
            <input type="text" id="preco" name="preco" required>

            <div class="acoes-formulario">
                <a href="index.php" class="botao botao-cancelar">Cancelar</a>

                <button type="submit" class="botao">Cadastrar Carro</button>
            </div>
        </form>
    </div>
</body>

</html>