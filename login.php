<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="form-container">
      <h2 class="form-title">Login</h2>
 
      <div id="erroLogin" class="alert alert-danger text-center d-none" role="alert">
        Email ou senha incorretos. Tente novamente.
      </div>
 
      <form action="login.php" method="POST">
        <div class="mb-3">
          <label for="email" class="form-label">Email *</label>
          <input type="email" class="form-control rounded-pill" name="email" id="email" placeholder="Digite seu email" required />
        </div>
 
        <div class="mb-3">
          <label for="password" class="form-label">Senha *</label>
          <input type="password" class="form-control rounded-pill" name="senha" id="password" placeholder="Digite sua senha" required />
        </div>
 
        <div class="d-grid">
          <button type="submit" class="btn btn-orange rounded-pill">Entrar</button>
        </div>
 
        <div class="extra-links mt-3">
          <a href="cadastro.php">Não tem conta?</a>
          <a href="#">Precisa de ajuda?</a>
        </div>
      </form>
    </div>
  </div>
 
 
  <script>
    const params = new URLSearchParams(window.location.search);
    if (params.get("erro") === "1") {
      const erroDiv = document.getElementById("erroLogin");
      erroDiv.classList.remove("d-none");
 
      setTimeout(() => {
        erroDiv.classList.add("d-none");
      }, 5000);
    }
  </script>
 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>





<?php
session_start();
require("conexao.php");
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
 
    $stmt = $conexao->prepare("SELECT id, nome FROM usuario WHERE email = ? AND senha = ?");
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $result = $stmt->get_result();
 
    if ($result->num_rows === 1) {
        $usuario = $result->fetch_assoc();
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: login.html?erro=1");
        exit();
    }
} else {
    header("Location: login.html");
    exit();
}
?>