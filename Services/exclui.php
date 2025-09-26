<?php

require_once '../Controllers/ControlaCarro.php';

if (!isset($_GET['id'])) {
    die('ID não fornecido para exclusão.');
}

$id = $_GET['id'];

$controlaCarro = new ControlaCarro();

$controlaCarro->excluir($id);

header("Location: ../Views/index.php");
exit;