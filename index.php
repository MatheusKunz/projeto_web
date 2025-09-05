<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD com PHP e PostgreSQL</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h2>Cadastrar Novo Usuário</h2>
        
        <form action="salvar-usuario.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
            
            <button type="submit">Cadastrar</button>
        </form>
        
        <hr>
        
        <h2>Usuários Cadastrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Inclui o arquivo de conexão
                include 'conexao.php';

                try {
                    // Prepara a consulta SQL para selecionar todos os usuários
                    $sql = "SELECT id, nome, email FROM usuarios ORDER BY id ASC";
                    $stmt = $conexao->prepare($sql);
                    $stmt->execute();

                    // Busca todos os resultados
                    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Se houver usuários, exibe cada um em uma linha da tabela
                    if (count($usuarios) > 0) {
                        foreach ($usuarios as $usuario) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($usuario['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($usuario['nome']) . "</td>";
                            echo "<td>" . htmlspecialchars($usuario['email']) . "</td>";
                            echo "<td>";
                            // Link para a página de edição, passando o ID do usuário
                            echo "<a href='editar.php?id=" . $usuario['id'] . "'>Editar</a> ";
                            // Link para o script de exclusão
                            echo "<a href='excluir.php?id=" . $usuario['id'] . "' onclick=\"return confirm('Tem certeza que deseja excluir este usuário?');\">Excluir</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        // Se não houver usuários, exibe uma mensagem
                        echo "<tr><td colspan='4'>Nenhum usuário cadastrado</td></tr>";
                    }
                } catch(PDOException $e) {
                    // Se ocorrer um erro na consulta, exibe a mensagem
                    echo "<tr><td colspan='4'>Erro ao buscar usuários: " . $e->getMessage() . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>