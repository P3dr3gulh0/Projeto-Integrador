<?php
session_start();
session_unset();    // Limpa todas as variáveis da sessão
session_destroy();  // Destroi a sessão
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Saindo...</title>
    <meta http-equiv="refresh" content="3;url=login.php"> <!-- Redireciona após 3 segundos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }
        .message-box {
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="message-box">
    <h2>Você foi desconectado.</h2>
    <p>Redirecionando para o login...</p>
</div>

</body>
</html>
