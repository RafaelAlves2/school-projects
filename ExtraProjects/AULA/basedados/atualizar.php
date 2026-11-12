<?php
session_start();
include_once 'bdados.php';

$id = $_SESSION['id'];
$querySelect = $conexao->query("SELECT * FROM clientes WHERE id='$id'");
$dados_antigos = $querySelect->fetch_assoc();
$nome_antigo_imagem = $dados_antigos['imagem'];

if ($_FILES['nova_imagem']['error'] === UPLOAD_ERR_OK) {
    $pasta = '../imagens/';
    $nome_nova_imagem = basename($_FILES['nova_imagem']['name']);
    $caminho_nova_imagem = $pasta . $nome_nova_imagem;
}

if (move_uploaded_file($_FILES['nova_imagem']['tmp_name'], $caminho_nova_imagem)) {
    if (!empty($nome_antigo_imagem)) {
        if (unlink($pasta . $nome_antigo_imagem)) {
            $_SESSION['msg'] = "<p class='center green-text'>" . "Foto excluída com sucesso!" . "<br>";
        } else {
            $_SESSION['msg'] = "<p class='center red-text'>" . "Falha ao excluir foto antiga!" . "<br>";
        }
    }
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
    $nome_imagem = $nome_nova_imagem;

    $queryAtualizar = $conexao->query("UPDATE clientes SET nome='$nome', email='$email', telefone='$telefone', imagem='$nome_imagem' WHERE id='$id'");
    $affected_rows = mysqli_affected_rows($conexao);

    if ($affected_rows > 0) {
        $_SESSION['msg'] = "<p class='center green-text'>" . "Dados atualizados com sucesso!" . "<br>";
        header("Location: ../consultas.php");
        exit();
    } else {
        header("Location: ../consultas.php");
        exit();
    }
} else {

    $nome_imagem = $nome_antigo_imagem;

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);

    $queryAtualizar = $conexao->query("UPDATE clientes SET nome='$nome', email='$email', telefone='$telefone' WHERE id='$id'");
    $affected_rows = mysqli_affected_rows($conexao);

    if ($affected_rows > 0) {
        $_SESSION['msg'] = "<p class='center green-text'>" . "Dados atualizados com sucesso!" . "<br>";
        header("Location: ../consultas.php");
        exit();
    } else {
        header("Location: ../consultas.php");
        exit();
    }
}