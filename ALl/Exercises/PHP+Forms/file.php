<form method="POST" enctype="multipart/form-data">
  Nome: <input type="text" name="nome" required><br>
  Email: <input type="email" name="email" required><br>
  Foto de perfil: <input type="file" name="foto" accept="image/*" required><br>
  <button type="submit">Cadastrar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $foto = $_FILES['foto'];

  if ($foto['error'] === 0) {
    $ext = pathinfo($foto['name'], PATHINFO_EXTENSION);
    $nomeFoto = uniqid() . '.' . $ext;
    mkdir($nome);
    $destino = "$nome/" . $nomeFoto;

    if (move_uploaded_file($foto['tmp_name'], $destino)) {
      echo "<h3>Cadastro realizado com sucesso!</h3>";
      echo "<p>Nome: $nome</p>";
      echo "<p>Email: $email</p>";
      echo "<p>Foto:</p><img src='$destino' width='150'>";
    } else {
      echo "<p style='color:red;'>Erro ao salvar a imagem.</p>";
    }
  } else {
    echo "<p style='color:red;'>Erro no upload do arquivo.</p>";
  }
}
?>
