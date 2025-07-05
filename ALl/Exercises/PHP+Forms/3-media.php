<form method="POST">
  Nome do aluno: <input type="text" name="nome" required><br>
  Nota 1: <input type="number" name="nota1" min="0" max="10" step="0.1" required><br>
  Nota 2: <input type="number" name="nota2" min="0" max="10" step="0.1" required><br>
  Nota 3: <input type="number" name="nota3" min="0" max="10" step="0.1" required><br>
  Nota 4: <input type="number" name="nota4" min="0" max="10" step="0.1" required><br>
  <button type="submit">Calcular Média</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $notas = [
    $_POST["nota1"],
    $_POST["nota2"],
    $_POST["nota3"],
    $_POST["nota4"]
  ];
  $media = array_sum($notas) / count($notas);

  if ($media >= 7) {
    $resultado = "Aprovado";
  } elseif ($media >= 5) {
    $resultado = "Recuperação";
  } else {
    $resultado = "Reprovado";
  }

  echo "<p>Aluno: $nome</p>";
  echo "<p>Média: " . number_format($media, 2) . "</p>";
  echo "<p>Situação: $resultado</p>";
}
?>
