<?php
    if (isset($_POST['btn_enviar'])) {

        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $noticia = filter_input(INPUT_POST, 'noticia', FILTER_SANITIZE_SPECIAL_CHARS);
        $subtitulo = filter_input(INPUT_POST, 'subtitulo', FILTER_SANITIZE_SPECIAL_CHARS);
        $corpo = filter_input(INPUT_POST, 'corpo', FILTER_SANITIZE_SPECIAL_CHARS);
        $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_NUMBER_INT);
        $publicada = filter_input(INPUT_POST, 'publicada', FILTER_SANITIZE_NUMBER_INT);
        $ip = filter_input(INPUT_POST, 'IP', FILTER_VALIDATE_IP);

        if ($ip === false) {
            echo "<span>IP INVÁLIDO</span>";
            exit; 
        }   

         echo "
    <table border='1' cellpadding='8' cellspacing='0'>
        <tr>
            <th>Variáveis</th>
            <th>Dados</th>
            <th>Observações</th>
        </tr>

        <tr>
            <td>Nome do Autor</td>
            <td>{$nome}</td>
            <td></td>
        </tr>

        <tr>
            <td>Título</td>
            <td>{$noticia}</td>
            <td></td>
        </tr>

        <tr>
            <td>Subtítulo</td>
            <td>{$subtitulo}</td>
            <td></td>
        </tr>

        <tr>
            <td>Corpo</td>
            <td>{$corpo}</td>
            <td></td>
        </tr>

        <tr>
            <td>Inserido em</td>
            <td>{$data}</td>
            <td></td>
        </tr>

        <tr>
            <td>Publicado em</td>
            <td>{$publicada}</td>
            <td></td>
        </tr>

        <tr>
            <td>IP de registo</td>
            <td>{$ip}</td>
            <td></td>
        </tr>
    </table>
    ";
    } else {
        header('Location: Form.html');
    }
?>