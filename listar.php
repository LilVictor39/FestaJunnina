<?php
$senhaCorreta = "junina2025"; // 🔒 Senha definida
$autenticado = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['senha']) && $_POST['senha'] === $senhaCorreta) {
        $autenticado = true;
    } else {
        $erro = "Senha incorreta!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Confirmados</title>
  <link rel="stylesheet" href="assets/style.css">
  <link rel="icon" href="assets/images/icone.ico" type="image/x-icon">
</head>
<body>
  <div class="container">
    <h1>Lista de Confirmados</h1>

    <?php if (!$autenticado): ?>
      <form method="POST">
        <label for="senha">Digite a senha para ver a lista:</label>
        <input type="password" id="senha" name="senha" required>
        <button type="submit">Acessar</button>
      </form>
      <?php if (isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
    <?php else: ?>
      <table border="1" cellpadding="10" cellspacing="0" style="width:100%; background: #fff; border-collapse: collapse;">
        <tr style="background: #ffcc80;">
          <th>Nome</th>
          <th>Prato</th>
          <th>Presença</th>
        </tr>
        <?php
        if (file_exists('participacoes.csv')) {
          $linhas = file('participacoes.csv');
          foreach ($linhas as $linha) {
            $dados = str_getcsv($linha);
            if (count($dados) === 3) {
              echo "<tr>
                <td>" . htmlspecialchars($dados[0]) . "</td>
                <td>" . htmlspecialchars($dados[1]) . "</td>
                <td>" . htmlspecialchars($dados[2]) . "</td>
              </tr>";
            }
          }
        } else {
          echo "<tr><td colspan='3'>Nenhuma confirmação ainda.</td></tr>";
        }
        ?>
      </table>
      <br>
      <a href="participacoes.csv" download class="btn-download">⬇️ Baixar Lista em CSV</a>
      <div class="info-link">
        <a href="index.php">⬅ Voltar</a>
      </div>
    <?php endif; ?>
  </div>
</body>
</html>
