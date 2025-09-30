<?php

require_once '../Controllers/ControlaCarro.php';

if (!isset($_GET['id'])) {
    die('ID do carro não informado.');
}

$controlaCarro = new ControlaCarro();
$carro = $controlaCarro->buscarPorId($_GET['id']);

if (!$carro) {
    die('Carro não encontrado.');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Carro</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<body>
    <?php require_once 'includes/menu.php'; ?>
    <div class="conteiner">
        <h2>Editar Carro</h2>

        <form action="../Services/processaEdicao.php" method="post">

            <input type="hidden" name="id" value="<?= $carro->getId() ?>">

            <label for="marca">Marca:</label><br>
            <input type="text" id="marca" name="marca" value="<?= htmlspecialchars($carro->getMarca()) ?>"
                required><br><br>

            <label for="modelo">Modelo:</label><br>
            <input type="text" id="modelo" name="modelo" value="<?= htmlspecialchars($carro->getModelo()) ?>"
                required><br><br>

            <label for="ano">Ano:</label><br>
            <input type="number" id="ano" name="ano" value="<?= htmlspecialchars($carro->getAno()) ?>" required><br><br>

            <label for="cor">Cor:</label><br>
            <input type="text" id="cor" name="cor" value="<?= htmlspecialchars($carro->getCor()) ?>"><br><br>

            <label for="placa">Placa:</label><br>
            <input type="text" id="placa" name="placa" value="<?= htmlspecialchars($carro->getPlaca()) ?>"
                required><br><br>

            <label for="preco">Preço:</label><br>
            <input type="text" id="preco" name="preco" value="<?= htmlspecialchars($carro->getPreco()) ?>"
                required><br><br>

            <div class="acoes-formulario">
                <a href="index.php" class="botao botao-cancelar">Cancelar</a>

                <button type="submit" class="botao">Atualizar Carro</button>
            </div>

        </form>
    </div>
</body>

</html>