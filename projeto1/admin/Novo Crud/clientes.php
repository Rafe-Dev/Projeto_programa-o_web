<?php include('conexao.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Clientes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Cadastro de Cliente</h1>
    <nav>
        <a href="index.php">Início</a>
        <a href="sobre.php">Sobre Nós</a>
        <a href="contato.php">Contato</a>
    </nav>
</header>

<form method="POST">
    <input type="text" name="nome" placeholder="Nome" required><br>
    <input type="email" name="email" placeholder="E-mail" required><br>
    <input type="password" name="senha" placeholder="Senha" required><br>
    <button type="submit" name="cadastrar">Cadastrar</button>
</form>

<?php
if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO clientes (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    if ($conn->query($sql)) {
        echo "<p>✅ Cadastro realizado com sucesso!</p>";
    } else {
        echo "<p>❌ Erro: ".$conn->error."</p>";
    }
}
?>
</body>
</html>