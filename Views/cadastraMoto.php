<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Moto</title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
</head>

<body>
    <?php require_once 'includes/menu.php'; ?>
    <div class="conteiner">
        <h2>Cadastro de Nova Moto</h2>
        <form action="../Services/processaCadastroMoto.php" method="post">
            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" required>
            <label for="modelo">Modelo:</label>
            <input type="text" id="modelo" name="modelo" required>
            <label for="ano">Ano:</label>
            <input type="number" id="ano" name="ano" required>
            <label for="cilindradas">Cilindradas:</label>
            <input type="number" id="cilindradas" name="cilindradas" required>
            <label for="preco">Preço:</label>
            <input type="text" id="preco" name="preco" required>
            <div class="acoes-formulario">
                <a href="listaMotos.php" class="botao botao-cancelar">Cancelar</a>
                <button type="submit" class="botao">Cadastrar Moto</button>
            </div>
        </form>
    </div>
</body>

</html>