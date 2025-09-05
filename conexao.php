<?php
$host = "localhost";
$port = "5432"; // Porta padrão do PostgreSQL
$banco = "meu_site";
$usuario = "postgres"; // Superusuário padrão
$senha = "postgres"; // **COLOQUE A SENHA QUE VOCÊ DEFINIU NA INSTALAÇÃO**

// String de conexão (DSN)
$dsn = "pgsql:host=$host;port=$port;dbname=$banco";

try {
    // Criar a conexão PDO
    $conexao = new PDO($dsn, $usuario, $senha);
    
    // Configura o PDO para lançar exceções em caso de erro
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Em caso de falha na conexão, exibe o erro
    die("Falha na conexão com o banco de dados: " . $e->getMessage());
}
?>