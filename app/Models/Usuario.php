<?php

class Usuario {
    // A conexão com o banco de dados
    private $conexao;

    // Propriedades do usuário
    public $id;
    public $nome;
    public $email;

    public function __construct($db) {
        $this->conexao = $db;
    }

    // Método para LER todos os usuários (Read)
    public function findAll() {
        $sql = "SELECT id, nome, email FROM usuarios ORDER BY nome ASC";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    // Método para LER um usuário pelo ID (Read)
    public function findById($id) {
        $sql = "SELECT id, nome, email FROM usuarios WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $this->id = $usuario['id'];
        $this->nome = $usuario['nome'];
        $this->email = $usuario['email'];
    }

    // Método para CRIAR um novo usuário (Create)
    public function create() {
        $sql = "INSERT INTO usuarios (nome, email) VALUES (?, ?)";
        $stmt = $this->conexao->prepare($sql);

        // Limpa os dados para segurança
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));

        $stmt->execute([$this->nome, $this->email]);
        return $stmt;
    }

    // Método para ATUALIZAR um usuário (Update)
    public function update() {
        $sql = "UPDATE usuarios SET nome = ?, email = ? WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->execute([$this->nome, $this->email, $this->id]);
        return $stmt;
    }

    // Método para DELETAR um usuário (Delete)
    public function delete() {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->execute([$this->id]);
        return $stmt;
    }
}
?>