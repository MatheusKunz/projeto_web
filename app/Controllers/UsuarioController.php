<?php
// Inclui o Model
require_once '../app/Models/Usuario.php';

class UsuarioController {
    private $usuario;

    public function __construct($db) {
        $this->usuario = new Usuario($db);
    }

    // Ação para listar todos os usuários (página inicial)
    public function index() {
        $stmt = $this->usuario->findAll();
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Chama a View de listagem
        require '../views/listar.php';
    }

    // Ação para exibir o formulário de criação
    public function create() {
        require '../views/formulario.php';
    }

    // Ação para exibir o formulário de edição
    public function edit() {
        $this->usuario->id = $_GET['id'];
        $this->usuario->findById($_GET['id']);
        // Reutilizamos a view do formulário, passando os dados do usuário
        $usuario = ['id' => $this->usuario->id, 'nome' => $this->usuario->nome, 'email' => $this->usuario->email];
        require '../views/formulario.php';
    }

    // Ação para salvar (tanto criar quanto editar)
    public function save() {
        // Se um ID foi enviado, é uma atualização
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $this->usuario->id = $_POST['id'];
            $this->usuario->nome = $_POST['nome'];
            $this->usuario->email = $_POST['email'];
            $this->usuario->update();
        } else { // Senão, é uma criação
            $this->usuario->nome = $_POST['nome'];
            $this->usuario->email = $_POST['email'];
            $this->usuario->create();
        }
        // Redireciona para a página inicial
        header('Location: index.php');
    }

    // Ação para deletar
    public function delete() {
        $this->usuario->id = $_GET['id'];
        $this->usuario->delete();
        header('Location: index.php');
    }
}
?>