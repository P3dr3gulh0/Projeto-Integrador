<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto container">
        <div class="myContainer tEscuro">
            <form method="POST">
                <img class="mb-4" src="img/Logo-trustwork-_Apresentação_-_1_.ico" alt="" width="102" height="72">
                <h1 class="h3 mb-3 fw-normal">Cadastro</h1>

                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" name="nome" placeholder="Seu nome completo" required>
                    <label for="floatingName">Nome completo</label>
                </div><br>

                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
                    <label for="floatingInput">Email</label>
                </div><br>

                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" name="senha" placeholder="Senha" required>
                    <label for="floatingPassword">Senha</label>
                </div>

                <div class="form-check text-start my-3">
                    <input class="form-check-input" type="checkbox" value="remember-me" id="checkDefault">
                    <label class="form-check-label" for="checkDefault">Lembre-se de mim</label>
                </div>

                <button class="btn btn-primary w-100 py-2" type="submit">Cadastrar</button>
                <p class="mt-5 mb-3 text-body-secondary">© 2017–2025</p>
            </form>

        </div>
        <a href="index.html"><button>Inicio</button></a>
    </main>
    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        class="astro-vvvwv3sm"></script>
</body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    require("conexao.php");

    $inserir = "INSERT INTO usuario (id, nome, email, senha)
        VALUES (NULL, '$nome', '$email', '$senha')";

    if (mysqli_query($conexao, $inserir)) {
        echo "<script>
            alert('Cadastro realizado com sucesso!');
            window.location.href = 'cadastro.php';
        </script>";
        exit();
    } else {
        echo "<script>
            alert('Erro ao cadastrar!');
            window.location.href = 'cadastro.php';
        </script>";
        exit();
    }
}
?>

</html>