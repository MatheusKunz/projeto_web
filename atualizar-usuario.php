<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'conexao.php';

    try {
        // Pega todos os dados do formulário, incluindo o ID oculto
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        // SQL para atualizar o registro
        $sql = "UPDATE usuarios SET nome = ?, email = ? WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        
        // Executa passando os novos valores e o ID para o WHERE
        $stmt->execute([$nome, $email, $id]);

        header("Location: index.php");
        exit();

    } catch(PDOException $e) {
        die("Erro ao atualizar usuário: " . $e->getMessage());
    }
} else {
    header("Location: index.php");
    exit();
}
?>