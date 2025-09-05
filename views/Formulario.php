<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Usuário</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h2><?php echo isset($usuario['id']) ? 'Editar Usuário' : 'Cadastrar Novo Usuário'; ?></h2>
        
        <form action="index.php?action=save" method="POST">
            <?php if (isset($usuario['id'])): ?>
                <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
            <?php endif; ?>
            
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $usuario['nome'] ?? ''; ?>" required>
            
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?php echo $usuario['email'] ?? ''; ?>" required>
            
            <button type="submit">Salvar</button>
        </form>
        <br>
        <a href="index.php">Voltar para a lista</a>
    </div>
</body>
</html>