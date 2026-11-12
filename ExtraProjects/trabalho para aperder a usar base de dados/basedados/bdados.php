<?php

    $conexao = mysqli_connect("localhost", "root", "", "aula");

    mysqli_set_charset($conexao, "utf8mb4");

    if ($conexao->connect_error) {
        die("Falha ao efetuar a ligação: " . $conexao->connect_error);
    }