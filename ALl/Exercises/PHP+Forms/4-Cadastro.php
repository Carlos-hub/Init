<form method="POST">
  Nome: <input type="text" name="nome"><br>
  E-mail: <input type="email" name="email"><br>
  Idade: <input type="number" name="idade"><br>
  <button type="submit">Enviar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $idade = $_POST["idade"];

  echo "<h3>Dados recebidos:</h3>";
  echo "<p>Nome: $nome</p>";
  echo "<p>Email: $email</p>";
  echo "<p>Idade: $idade anos</p>";
}
?>