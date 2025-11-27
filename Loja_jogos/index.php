<?php


include('conexao.php'); 
include('header.php');  


$sql = "SELECT * FROM jogos ORDER BY id DESC";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<h2 class="text-center text-light mb-4">Jogos em Destaque</h2>

<div class="row g-4 justify-content-center">
  <?php while ($jogo = mysqli_fetch_assoc($result)) { 
    
    $img = !empty($jogo['imagem']) ? $jogo['imagem'] : 'placeholder.png';

?>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="card h-100 card-dark jogo-card">
        
        <img src="imagens_jogos/<?php echo htmlspecialchars($img); ?>" class="card-img-top jogo-img" alt="<?php echo htmlspecialchars($jogo['titulo']); ?>">

        <div class="card-body d-flex flex-column">
          <h5 class="card-title text-light"><?php echo htmlspecialchars($jogo['titulo']); ?></h5>
          <p class="card-text text-muted small mb-2"><?php echo htmlspecialchars($jogo['descricao']); ?></p>

        
          <div class="mt-auto d-flex justify-content-between align-items-center">
            <span class="preco text-orange fw-bold">R$ <?php echo number_format($jogo['preco'], 2, ',', '.'); ?></span>
            <a href="#" class="btn btn-outline-orange btn-sm">Comprar</a>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
</div>

<?php
mysqli_stmt_close($stmt);
include('footer.php');
?>