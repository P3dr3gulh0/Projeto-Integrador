<?php
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
    <title>Perfil - Trustwork</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }

        .perfil-container {
            max-width: 480px;
            margin: 60px auto;
            background-color: #fff;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            text-align: center;
        }

        .perfil-container h2 {
            margin-bottom: 30px;
            color: #001f3f;
        }

        .perfil-container p {
            font-size: 1.1em;
            margin: 10px 0;
        }

        .btn-logout {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            transition: background-color 0.2s;
        }

        .btn-logout:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>

    <div class="perfil-container">
        <h2>Perfil do Usuário</h2>
        <p><strong>Nome:</strong> <?php echo htmlspecialchars($_SESSION["usuario"]["nome"]); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION["usuario"]["email"]); ?></p>
        <a href="http://localhost/testeTrustwork/logout.php" class="btn btn-logout mt-4">Sair</a>
    </div>

</body>

</html>
