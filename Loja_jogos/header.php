<?php
// header.php
// Inclua este arquivo no topo das páginas para carregar o cabeçalho e o CSS.
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Loja de Jogos</title>

  <!-- Bootstrap 5 CSS (CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Optional: Bootstrap Icons (usado em algumas seções) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- CSS personalizado -->
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- Navbar principal (tema escuro) -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark-custom">
    <div class="container">
      <a class="navbar-brand fw-bold" href="index.php">🎮 Loja de Jogos</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="menuNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="clientes.php">Clientes</a></li>
          <li class="nav-item"><a class="nav-link" href="sobre-nos.php">Sobre Nós</a></li>
          <li class="nav-item"><a class="nav-link" href="contato.php">Contato</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Container principal -->
  <main class="container my-4">