<?php
// Verifica se o formulário foi submetido (método POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'conexao.php'; // Inclui a conexão com o banco

    try {
        // Pega os dados do formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        // A consulta SQL para inserir dados. Os '?' são placeholders.
        $sql = "INSERT INTO usuarios (nome, email) VALUES (?, ?)";

        // Prepara a instrução SQL para ser executada
        $stmt = $conexao->prepare($sql);

        // Executa a instrução, passando os valores para os placeholders
        // Os valores são passados em um array, na ordem correta
        $stmt->execute([$nome, $email]);

        // Redireciona de volta para a página inicial após o sucesso
        header("Location: index.php");
        exit(); // Garante que o script pare de ser executado após o redirecionamento

    } catch(PDOException $e) {
        // Em caso de erro, exibe a mensagem
        die("Erro ao cadastrar usuário: " . $e->getMessage());
    }
} else {
    // Se alguém tentar acessar o arquivo diretamente, redireciona para o index
    header("Location: index.php");
    exit();
}
?>