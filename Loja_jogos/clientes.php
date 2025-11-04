<?php
// clientes.php
include('conexao.php');
include('header.php');

// Processa cadastro se formulário enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['salvar'])) {
    // Recebe e limpa dados (trim)
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');

    // Inserção segura com prepared statement
    $sql = "INSERT INTO clientes (nome, email, telefone) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $nome, $email, $telefone);

    if (mysqli_stmt_execute($stmt)) {
        $msg_sucesso = "Cliente cadastrado com sucesso!";
    } else {
        $msg_erro = "Erro ao cadastrar cliente.";
    }
    mysqli_stmt_close($stmt);
}

// Busca clientes para listar
$sql2 = "SELECT * FROM clientes ORDER BY id DESC";
$res = mysqli_query($conexao, $sql2);
?>

<h2 class="text-center text-light mb-4">Cadastro de Clientes</h2>

<div class="row justify-content-center">
  <div class="col-md-6">
    <form method="POST" class="card card-dark p-4 shadow-sm">
      <?php if (!empty($msg_sucesso)) : ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($msg_sucesso); ?></div>
      <?php endif; ?>
      <?php if (!empty($msg_erro)) : ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($msg_erro); ?></div>
      <?php endif; ?>

      <div class="mb-3">
        <label class="form-label text-light">Nome</label>
        <input type="text" name="nome" class="form-control form-control-dark" required>
      </div>
      <div class="mb-3">
        <label class="form-label text-light">Email</label>
        <input type="email" name="email" class="form-control form-control-dark" required>
      </div>
      <div class="mb-3">
        <label class="form-label text-light">Telefone</label>
        <input type="text" name="telefone" class="form-control form-control-dark">
      </div>

      <button type="submit" name="salvar" class="btn btn-orange w-100">Cadastrar</button>
    </form>
  </div>
</div>

<!-- Lista de clientes -->
<h3 class="text-center text-light mt-5">Clientes Cadastrados</h3>
<div class="table-responsive mt-3">
  <table class="table table-dark table-striped align-middle">
    <thead class="table-orange">
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Data</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($cliente = mysqli_fetch_assoc($res)) { ?>
        <tr>
          <td><?php echo $cliente['id']; ?></td>
          <td><?php echo htmlspecialchars($cliente['nome']); ?></td>
          <td><?php echo htmlspecialchars($cliente['email']); ?></td>
          <td><?php echo htmlspecialchars($cliente['telefone']); ?></td>
          <td><?php echo $cliente['data_cadastro']; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<?php include('footer.php'); ?>