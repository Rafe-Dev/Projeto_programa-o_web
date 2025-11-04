<?php
// contato.php
// Página de contato — salva mensagens na tabela `mensagens`.

include('conexao.php');
include('header.php');

$feedback = null;

// Processa envio
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar_mensagem'])) {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $mensagem = trim($_POST['mensagem'] ?? '');

    // Validações simples
    if ($nome === '' || $email === '' || $mensagem === '') {
        $feedback = ['tipo' => 'danger', 'texto' => 'Por favor preencha todos os campos.'];
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $feedback = ['tipo' => 'danger', 'texto' => 'E-mail inválido.'];
    } else {
        // Insere mensagem com prepared statement
        $sql = "INSERT INTO mensagens (nome, email, mensagem) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $nome, $email, $mensagem);

        if (mysqli_stmt_execute($stmt)) {
            $feedback = ['tipo' => 'success', 'texto' => 'Mensagem enviada com sucesso!'];
            // Limpa inputs (opcional)
            $nome = $email = $mensagem = '';
        } else {
            $feedback = ['tipo' => 'danger', 'texto' => 'Erro ao enviar mensagem. Tente novamente.'];
        }
        mysqli_stmt_close($stmt);
    }
}
?>

<h2 class="text-center text-light mb-4">Contato</h2>

<div class="row justify-content-center">
  <div class="col-md-8">
    <?php if ($feedback) : ?>
      <div class="alert alert-<?php echo $feedback['tipo']; ?>">
        <?php echo htmlspecialchars($feedback['texto']); ?>
      </div>
    <?php endif; ?>

    <div class="card card-dark p-4 shadow-sm">
      <form method="POST">
        <div class="mb-3">
          <label class="form-label text-light">Nome</label>
          <input type="text" name="nome" class="form-control form-control-dark" value="<?php echo htmlspecialchars($nome ?? ''); ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label text-light">Email</label>
          <input type="email" name="email" class="form-control form-control-dark" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label text-light">Mensagem</label>
          <textarea name="mensagem" rows="6" class="form-control form-control-dark" required><?php echo htmlspecialchars($mensagem ?? ''); ?></textarea>
        </div>

        <button type="submit" name="enviar_mensagem" class="btn btn-orange w-100">Enviar Mensagem</button>
      </form>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>