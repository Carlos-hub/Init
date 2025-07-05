<form method="POST">
  Nome: <input type="text" name="nome"><br>
  Idade: <input type="number" name="idade"><br>
  <button type="submit">Verificar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $idade = $_POST["idade"];

  $status = $idade >= 18 ? "maior de idade" : "menor de idade";

  echo "<p>$nome é $status.</p>";
}
?>