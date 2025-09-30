<?php
require_once '../Controllers/ControlaMoto.php';
if (isset($_GET['id'])) {
    $controlaMoto = new ControlaMoto();
    $controlaMoto->excluir($_GET['id']);
    header('Location: ../Views/listaMotos.php');
    exit;
}