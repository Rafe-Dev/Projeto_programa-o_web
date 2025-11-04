<?php include('conexao.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Loja de Jogos Virtuais</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Loja de Jogos</h1>
    <nav>
        <a href="index.php">Início</a>
        <a href="clientes.php">Clientes</a>
        <a href="sobre.php">Sobre Nós</a>
        <a href="contato.php">Contato</a>
    </nav>
</header>

<h2>🎮 Jogos Disponíveis</h2>
<div class="jogos">
<?php
$sql = "SELECT * FROM jogos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='jogo'>";
        echo "<img src='imagens/".$row['imagem']."' width='150'><br>";
        echo "<h3>".$row['titulo']."</h3>";
        echo "<p>".$row['descricao']."</p>";
        echo "<strong>R$ ".$row['preco']."</strong>";
        echo "</div>";
    }
} else {
    echo "Nenhum jogo disponível.";
}
?>
</div>
</body>
</html>