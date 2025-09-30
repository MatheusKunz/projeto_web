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
    <link rel="stylesheet" href="../assets/css/estilo.css">
</head>

<body>
    <?php require_once 'includes/menu.php'; ?>
    <div class="conteiner">
        <h2>Editar Carro</h2><br>

        <form action="../Services/processaEdicao.php" method="post">

            <input type="hidden" name="id" value="<?= $carro->getId() ?>">

            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" value="<?= htmlspecialchars($carro->getMarca()) ?>"
                required>

            <label for="modelo">Modelo:</label>
            <input type="text" id="modelo" name="modelo" value="<?= htmlspecialchars($carro->getModelo()) ?>"
                required>

            <label for="ano">Ano:</label>
            <input type="number" id="ano" name="ano" value="<?= htmlspecialchars($carro->getAno()) ?>" required>

            <label for="cor">Cor:</label>
            <input type="text" id="cor" name="cor" value="<?= htmlspecialchars($carro->getCor()) ?>">

            <label for="placa">Placa:</label>
            <input type="text" id="placa" name="placa" value="<?= htmlspecialchars($carro->getPlaca()) ?>"
                required>

            <label for="preco">Preço:</label>
            <input type="text" id="preco" name="preco" value="<?= htmlspecialchars($carro->getPreco()) ?>"
                required>

            <div class="acoes-formulario">
                <a href="index.php" class="botao botao-cancelar">Cancelar</a>

                <button type="submit" class="botao">Atualizar Carro</button>
            </div>

        </form>
    </div>
</body>

</html>