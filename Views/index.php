<?php

require_once '../Controllers/ControlaCarro.php';
$controlaCarro = new ControlaCarro();

$carros = $controlaCarro->listar();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Carros</title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
</head>
<body>
    <?php require_once 'includes/menu.php'; ?>
<div class="conteiner">
    <h2>Catálogo de Carros</h2><br>

    <a class="botao" href="cadastra.php">Cadastrar Novo Carro</a><br><br>

    <?php if (count($carros) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Ano</th>
                    <th>Placa</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carros as $carro): ?>
                    <tr>
                        <td><?= htmlspecialchars($carro->getMarca()) ?></td>
                        <td><?= htmlspecialchars($carro->getModelo()) ?></td>
                        <td><?= htmlspecialchars($carro->getAno()) ?></td>
                        <td><?= htmlspecialchars($carro->getPlaca()) ?></td>
                        <td>R$ <?= number_format($carro->getPreco(), 2, ',', '.') ?></td>
                        <td>
                            <a class="button" href="editaCarro.php?id=<?= $carro->getId() ?>">Editar</a>
                            <a class="button delete" href="../Services/exclui.php?id=<?= $carro->getId() ?>" onclick="return confirm('Tem certeza?');">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum carro cadastrado.</p>
    <?php endif; ?>
</div>
</body>
</html>