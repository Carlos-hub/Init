<!-- Cadastrosssss -->


<?php
session_start();

if (!isset($_SESSION['produtos'])) {
  $_SESSION['produtos'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $produto = [
    'nome' => $_POST['nome'],
    'preco' => (float) $_POST['preco'],
    'categoria' => $_POST['categoria']
  ];
  $_SESSION['produtos'][] = $produto;
}
?>

<form method="POST">
  Nome do produto: <input type="text" name="nome" required><br>
  Preço: <input type="number" name="preco" step="0.01" required><br>
  Categoria:
  <select name="categoria">
    <option value="Alimentos">Alimentos</option>
    <option value="Eletrônicos">Eletrônicos</option>
    <option value="Roupas">Roupas</option>
  </select><br>
  <button type="submit">Cadastrar</button>
</form>

<h3>Produtos Cadastrados:</h3>
<ul>
  <?php foreach ($_SESSION['produtos'] as $p): ?>
    <li>
      <strong><?= $p['nome'] ?></strong> -
      R$ <?= number_format($p['preco'], 2, ',', '.') ?> -
      Categoria: <?= $p['categoria'] ?>
    </li>
  <?php endforeach; ?>
</ul>
