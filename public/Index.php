<?php
// Inclui a conexão com o banco
require_once '../config/conexao.php';
// Inclui o Controller
require_once '../app/Controllers/UsuarioController.php';

// Cria uma instância do Controller, passando a conexão PDO
$controller = new UsuarioController($conexao);

// Define a ação padrão como 'index' (listar)
$action = 'index';

// Verifica se uma ação foi passada na URL (ex: index.php?action=create)
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

// Executa o método do controller correspondente à ação
switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'edit':
        $controller->edit();
        break;
    case 'save':
        $controller->save();
        break;
    case 'delete':
        $controller->delete();
        break;
    default:
        $controller->index();
        break;
}
?>