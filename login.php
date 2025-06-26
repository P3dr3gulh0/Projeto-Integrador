<?php
ini_set('session.gc_maxlifetime', 3600); // 1 hora
session_set_cookie_params(3600);
session_start();
if (isset($_SESSION["usuario"])) {
    header("Location: perfil.php");
    exit;
}
include('conexao.php');

$erro = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuario WHERE email = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($senha, $row["senha"])) {
            $_SESSION["usuario"] = [
                "nome" => $row["nome"],
                "email" => $row["email"]
            ];
            header("Location: perfil.php");
            exit;
        } else {
            $erro = "Senha incorreta.";
        }
    } else {
        $erro = "Usuário não encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login - Trustwork</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #c6c6c5;
        }

        .login-container {
            max-width: 400px;
            margin: 60px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-orange {
            background-color: #FA7426;
            border: none;
            color: white;
        }

        .btn-orange:hover {
            background-color: #e26317;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-container">
            <h2 class="text-center mb-4">Login - Trustwork</h2>
            <?php if ($erro): ?>
                <div class="alert alert-danger" role="alert">
                    <?= htmlspecialchars($erro) ?>
                </div>
            <?php endif; ?>
            <form method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha:</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>
                <button type="submit" class="btn btn-orange w-100">Entrar</button>
            </form>
        </div>
    </div>
</body>

</html>