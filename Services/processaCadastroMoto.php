<?php
require_once '../Controllers/ControlaMoto.php';
require_once '../Models/Moto.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $moto = new Moto($_POST['marca'], $_POST['modelo'], $_POST['ano'], $_POST['cilindradas'], $_POST['preco']);
    $controlaMoto = new ControlaMoto();
    $controlaMoto->salvar($moto);
    header('Location: ../Views/listaMotos.php');
    exit;
}