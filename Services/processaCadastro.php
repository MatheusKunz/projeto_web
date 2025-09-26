<?php
require_once '../Controllers/ControlaCarro.php';
require_once '../Models/Carro.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $cor = $_POST['cor'];
    $placa = $_POST['placa'];
    $preco = $_POST['preco'];

    $carro = new Carro($marca, $modelo, $ano, $cor, $placa, $preco);

    $controlaCarro = new ControlaCarro();
    
    $controlaCarro->salvar($carro);

    header('Location: ../Views/index.php');
    exit;
}