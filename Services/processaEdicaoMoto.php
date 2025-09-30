<?php
require_once '../Controllers/ControlaMoto.php';
require_once '../Models/Moto.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $moto = new Moto($_POST['marca'], $_POST['modelo'], $_POST['ano'], $_POST['cilindradas'], $_POST['preco']);
    $moto->setId($_POST['id']);
    $controlaMoto = new ControlaMoto();
    $controlaMoto->atualizar($moto);
    header('Location: ../Views/listaMotos.php');
    exit;
}