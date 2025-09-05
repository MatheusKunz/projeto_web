<?php
include 'conexao.php';

// Verifica se um ID foi passado pela URL
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

try {
    // Busca os dados do usuário específico
    $sql = "SELECT id, nome, email FROM usuarios WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([$id]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Se não encontrar o usuário, volta para a página inicial
    if (!$usuario) {
        header("Location: index.php");
        exit();
    }
} catch (PDOException $e) {
    die("Erro ao buscar usuário: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h2>Editar Usuário</h2>
        
        <form action="atualizar-usuario.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id']); ?>">
            
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required>
            
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
            
            <button type="submit">Atualizar</button>
        </form>
    </div>
</body>
</html>