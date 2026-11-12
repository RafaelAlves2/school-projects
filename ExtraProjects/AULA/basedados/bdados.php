<?php

//quando há um erro na query, em vez de dar "silêncio" 
//e tudo a branco, o PHP indica qual o problema
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//'localhost' -> nome do Servidor / 'root' -> nome do utilizador 
// ''-> password / 'aula' -> nome da base de dados
$conexao = mysqli_connect("localhost", "root", "", "aula");

//Verifica se a ligação falhou
if (!$conexao) {
    die("Falha ao efetuar a ligação:" . mysqli_connect_error());
}
//utf8mb4 -> garante acentos e caracteres modernos (incluindo emojis)
if (!mysqli_set_charset($conexao, "utf8mb4")) {
    die("Erro ao definir charset: " . mysqli_error($conexao));
}
