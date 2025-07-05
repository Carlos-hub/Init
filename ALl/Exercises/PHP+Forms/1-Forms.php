<form method="POST">
  Número 1: <input type="number" name="n1" required><br>
  Número 2: <input type="number" name="n2" required><br>
  Operação: 
  <select name="op">
    <option value="+">Soma</option>
    <option value="-">Subtração</option>
    <option value="*">Multiplicação</option>
    <option value="/">Divisão</option>
  </select><br>
  <button type="submit">Calcular</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $n1 = $_POST["n1"];
  $n2 = $_POST["n2"];
  $op = $_POST["op"];
  
  switch ($op) {
    case '+': $res = $n1 + $n2; break;
    case '-': $res = $n1 - $n2; break;
    case '*': $res = $n1 * $n2; break;
    case '/': $res = $n2 != 0 ? $n1 / $n2 : "Divisão por zero"; break;
  }

  echo "<p>Resultado: $res</p>";
}
?>
