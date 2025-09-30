<?php
require_once '../Controllers/ControlaMoto.php';
$controlaMoto = new ControlaMoto();
$motos = $controlaMoto->listar();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Catálogo de Motos</title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
</head>

<body>
    <?php require_once 'includes/menu.php'; ?>
    <div class="conteiner">
        <h2>Catálogo de Motos</h2>
        <a class="botao" href="cadastraMoto.php">Cadastrar Nova Moto</a>
        <table>
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Ano</th>
                    <th>Cilindradas</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($motos) > 0): ?>
                    <?php foreach ($motos as $moto): ?>
                        <tr>
                            <td><?= htmlspecialchars($moto->getMarca()) ?></td>
                            <td><?= htmlspecialchars($moto->getModelo()) ?></td>
                            <td><?= htmlspecialchars($moto->getAno()) ?></td>
                            <td><?= htmlspecialchars($moto->getCilindradas()) ?> cc</td>
                            <td>R$ <?= number_format($moto->getPreco(), 2, ',', '.') ?></td>
                            <td>
                                <a class="button" href="editaMoto.php?id=<?= $moto->getId() ?>">Editar</a>
                                <a class="button delete" href="../Services/processaExclusaoMoto.php?id=<?= $moto->getId() ?>"
                                    onclick="return confirm('Tem certeza?');">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Nenhuma moto cadastrada.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>