<?php
$conexao = mysqli_connect("localhost", "root", "", "trustwork");

if (!$conexao) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}

mysqli_set_charset($conexao, "utf8");
?>
