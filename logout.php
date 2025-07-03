<?php
session_start();
session_unset(); 
session_destroy();  
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Saindo...</title>
    <meta http-equiv="refresh" content="3;url=login.php"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="message-box">
        <h2>Você foi desconectado.</h2>
        <p>Redirecionando para o login...</p>
    </div>

</body>

</html>