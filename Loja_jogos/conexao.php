<?php
// conexao.php
// === Configurações de conexão com o MySQL ===
// Ajuste $usuario e $senha se você usa outro usuário/senha no XAMPP.
// Em XAMPP padrão, usuário = root e senha = "" (vazio).

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "loja_jogos";

// Cria conexão
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

// Verifica conexão
if (!$conexao) {
    // Em ambiente de produção, não exibir detalhes do erro
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Define charset para evitar problemas com acentuação
mysqli_set_charset($conexao, "utf8mb4");
?>