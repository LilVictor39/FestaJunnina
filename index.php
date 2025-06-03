<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Confirmação Festa Junina</title>
  <link rel="stylesheet" href="assets/style.css">
  <link rel="icon" href="assets/images/icone.ico" type="image/x-icon">
</head>
<body>
    <div class="topo-logo">
        <img src="assets/images/logo.png" alt="Logo Festa Junina">
    </div>
    <div class="container">
        <h1>🎉 Festa Junina da Rua – 28/06 às 19h30</h1>
        <p>Estamos organizando nossa festa junina e queremos saber quem irá participar.</p>
        <p>Cada participante deve levar um <strong>prato típico</strong> (bolo, canjica, curau, milho...) e <strong>500g de carne + bebida</strong> para o churrasco 🍖🍻.</p>

        <form action="confirmacao.php" method="POST">
        <label for="nome">Seu nome completo:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="prato">Qual prato típico você levará?</label>
        <input type="text" id="prato" name="prato" required>

        <label for="presenca">Você confirma presença?</label>
        <select id="presenca" name="presenca" required>
            <option value="">-- Selecione --</option>
            <option value="Sim">Sim</option>
            <option value="Talvez">Talvez</option>
            <option value="Não">Não</option>
        </select>

        <button type="submit">Confirmar Presença</button>
        </form>

        <div class="info-link">
            <a href="listar.php">📋 Ver confirmações</a>
        </div>
    </div>
</body>
</html>
