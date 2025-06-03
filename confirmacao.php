<?php
function limparEntrada($valor) {
  return htmlspecialchars(strip_tags(trim($valor)));
}

$arquivoCSV = 'participacoes.csv';
$novoArquivo = !file_exists($arquivoCSV); // Verifica se o arquivo ainda não existe

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nome = limparEntrada($_POST['nome']);
  $prato = limparEntrada($_POST['prato']);
  $presenca = limparEntrada($_POST['presenca']);

  if (!$nome || !$prato || !$presenca) {
    echo "<script>alert('Por favor, preencha todos os campos.'); window.history.back();</script>";
    exit;
  }

  $linha = [$nome, $prato, $presenca];

  $fp = fopen($arquivoCSV, 'a');

  // Adiciona cabeçalho se for a primeira linha
  if ($novoArquivo) {
    fputcsv($fp, ['Nome', 'Prato', 'Presença'], ';');
  }

  fputcsv($fp, $linha, ';'); // separador por ponto e vírgula
  fclose($fp);

  echo "<script>alert('Confirmação registrada com sucesso!'); window.location.href='index.php';</script>";
} else {
  header("Location: index.php");
  exit;
}
