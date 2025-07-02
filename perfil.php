<?php
ini_set('session.gc_maxlifetime', 3600); // 1 hora
session_set_cookie_params(3600);
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Perfil - Trustwork</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="perfil-container">
        <h2>Perfil do Usuário</h2>
        <p><strong>Nome:</strong> <?php echo htmlspecialchars($_SESSION["usuario"]["nome"]); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION["usuario"]["email"]); ?></p>
        <a href="http://localhost/Projeto-Integrador/logout.php" class="btn btn-logout mt-4">Sair</a>
        <a style="background-color: #e26317;" href="index.html" class="btn btn-logout mt-4">Voltar</a>
    </div>

</body>

</html>