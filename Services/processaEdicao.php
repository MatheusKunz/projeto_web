<?php

require_once '../Models/Carro.php';
require_once '../Controllers/ControlaCarro.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    
    $id = $_POST['id'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $cor = $_POST['cor'];
    $placa = $_POST['placa'];
    $preco = $_POST['preco'];

    $carro = new Carro($marca, $modelo, $ano, $cor, $placa, $preco);

    $carro->setId($id);
    
    $controlaCarro = new ControlaCarro();

    $controlaCarro->atualizar($carro);

    header("Location: ../Views/index.php");
    exit;
}