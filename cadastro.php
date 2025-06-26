<?php include('conexao.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Trustwork</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #c6c6c5;
            font-family: 'Segoe UI', sans-serif;
        }

        .cadastro-container {
            max-width: 450px;
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
            </form>

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
