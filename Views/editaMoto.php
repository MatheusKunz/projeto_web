<?php
require_once '../Controllers/ControlaMoto.php';
if (!isset($_GET['id']))
    die('ID da moto não informado.');
$controlaMoto = new ControlaMoto();
$moto = $controlaMoto->buscarPorId($_GET['id']);
if (!$moto)
    die('Moto não encontrada.');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Moto</title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
</head>

<body>
    <?php require_once 'includes/menu.php'; ?>
    <div class="conteiner">
        <h2>Editar Moto</h2>
        <form action="../Services/processaEdicaoMoto.php" method="post">
            <input type="hidden" name="id" value="<?= $moto->getId() ?>">
            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" value="<?= htmlspecialchars($moto->getMarca()) ?>" required>
            <label for="modelo">Modelo:</label>
            <input type="text" id="modelo" name="modelo" value="<?= htmlspecialchars($moto->getModelo()) ?>" required>
            <label for="ano">Ano:</label>
            <input type="number" id="ano" name="ano" value="<?= htmlspecialchars($moto->getAno()) ?>" required>
            <label for="cilindradas">Cilindradas:</label>
            <input type="number" id="cilindradas" name="cilindradas"
                value="<?= htmlspecialchars($moto->getCilindradas()) ?>" required>
            <label for="preco">Preço:</label>
            <input type="text" id="preco" name="preco" value="<?= htmlspecialchars($moto->getPreco()) ?>" required>
            <div class="acoes-formulario">
                <a href="listaMotos.php" class="botao botao-cancelar">Cancelar</a>
                <button type="submit" class="botao">Atualizar Moto</button>
            </div>
        </form>
    </div>
</body>

</html>