<?php include('conexao.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro - Trustwork</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="cadastro">

    <div class="container">
        <div class="cadastro-container">
            <h2 class="text-center mb-4">Cadastro - Trustwork</h2>

            <form method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha:</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>
                <button type="submit" class="btn btn-orange w-100">Cadastrar</button>
                <a style="background-color: #e26317;" href="index.html" class="btn btn-logout mt-4">Voltar</a>
            </form>
            <div class="text-center mt-4">
                <p class="text-muted">
                    Já tem uma conta?
                    <a href="http://localhost/Projeto-Integrador/login.php" class="text-decoration-none fw-semibold">
                        Faça login aqui
                    </a>
                </p>
            </div>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nome = mysqli_real_escape_string($conexao, $_POST["nome"]);
                $email = mysqli_real_escape_string($conexao, $_POST["email"]);
                $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

                $sql = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)";
                $stmt = mysqli_prepare($conexao, $sql);
                mysqli_stmt_bind_param($stmt, "sss", $nome, $email, $senha);

                if (mysqli_stmt_execute($stmt)) {
                    echo '<div class="alert alert-success mt-3">Cadastro realizado com sucesso!</div>';
                } else {
                    echo '<div class="alert alert-danger mt-3">Erro ao cadastrar: ' . mysqli_error($conexao) . '</div>';
                }
            }
            ?>
        </div>
    </div>

</body>

</html>