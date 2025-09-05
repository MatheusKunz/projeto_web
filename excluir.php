<?php
// Verifica se foi passado um ID pela URL
if (isset($_GET['id'])) {
    include 'conexao.php';

    try {
        $id = $_GET['id'];

        // SQL para deletar o registro
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([$id]);

        header("Location: index.php");
        exit();

    } catch(PDOException $e) {
        die("Erro ao excluir usuário: " . $e->getMessage());
    }
} else {
    header("Location: index.php");
    exit();
}
?>