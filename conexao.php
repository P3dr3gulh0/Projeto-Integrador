<?php
    $conexao = mysqli_connect("localhost", "root", "", "trustwork");

    if (!$conexao) {
        die("Erro banco de dados!");
    }

    mysqli_set_charset($conexao, "utf8");
?>