<?php
    session_start();
    include_once "bdados.php";

    if($_FILES['image']['error']===UPLOAD_ERR_OK){
      $nome=filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $email=filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $telefone=filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);

        //Pasta onde vamos gyardar as imagens
        $pasta = '../imagens/';
        //Nome do ficheiro
        $nome_ficheiro=basename($_FILES['image']['name']);
        //Caminho completo do ficheiro
        $caminho_ficheiro=$pasta.$nome_ficheiro;

        if(move_uploaded_file($_FILES['image']['tmp_name'], $caminho_ficheiro)){
           $nome_imagem=$nome_ficheiro;
           $queryInsert=$conexao->query("INSERT INTO clientes VALUES (default,'$nome', '$email','$telefone', '$nome_imagem')");

            $affected_rows=mysqli_affected_rows($conexao);
            if($affected_rows>0){
                $_SESSION['msg']="<p class='center green-text'>"."Registo efetuado com sucesso"."</p>";
                header("Location: ../");
                exit();
            }
        } else {
            echo $_FILES['image']['error'];
            $_SESSION['msg']="<p class='center red-text'>"."Erro ao enviar a imagem" . "</p>";
            header("Location: ../");
            exit();
        }
    } else {
        $_SESSION['msg']="<p class='center red-text'>"."Por favor, insira uma imagem!" . "</p>";
        header("Location: ../");
        exit();
    }
?>
    