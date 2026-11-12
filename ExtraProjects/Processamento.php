<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processamento da Notícia</title>
</head>
<body>

<?php
if (isset($_POST['enviar'])) {

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $noticia = filter_input(INPUT_POST, 'noticia', FILTER_SANITIZE_SPECIAL_CHARS);
    $subtitulo = filter_input(INPUT_POST, 'subtitulo', FILTER_SANITIZE_SPECIAL_CHARS);
    $corpo = filter_input(INPUT_POST, 'corpo', FILTER_SANITIZE_SPECIAL_CHARS);
    $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_NUMBER_INT);
    $publicada = filter_input(INPUT_POST, 'publicada', FILTER_SANITIZE_NUMBER_INT);
    $ip = filter_input(INPUT_POST, 'IP', FILTER_VALIDATE_IP);

    if ($ip === false) {
        echo "<p style='color:red; font-weight:bold;'>IP INVÁLIDO!!</p>";
        exit;
    }

    $dados = [
        "Nome do Autor" => $nome,
        "Título" => $noticia,
        "Subtítulo" => $subtitulo,
        "Corpo" => $corpo,
        "Inserido em" => $data,
        "Publicado em" => $publicada,
        "IP de registo" => $ip
    ];
    
    echo '<table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>Variável</th>
                <th>Valor</th>
                <th>Observações</th>
            </tr>';

    foreach ($dados as $variavel => $valor) {
        echo "<tr>
                <td>{$variavel}</td>
                <td>{$valor}</td>
                <td></td>
              </tr>";
    }

    echo '</table>';

} else {
    header('Location: Form.html');
    exit;
}
?>

</body>
</html>



