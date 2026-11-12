<?php
include_once "bdados.php";

$id= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$queryApagar = $conexao->query("DELETE FROM clientes WHERE id='$id'");

if (mysqli_affected_rows($conexao)>0) {
    header("Location: ../consultas.php");
}