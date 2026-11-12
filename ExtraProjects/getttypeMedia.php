<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio com Gettype</title>
</head>
<body>

    <h1>****MÉDIA, UTILIZANDO O Gettype****</h1>

    <?php 
        $nota1 = 12;
        $nota2 = 8;

        echo "No 1º teste de redes de comunicação tive ". $nota1 ." e no 2º teste tive " . $nota2 ."<br>";

        $media = ($nota1 + $nota2) / 2;

        echo "A média dos dois testes é: " . $media . "<br>";
        echo "O tipo de dado da média é: " . gettype($media);
    ?>
</body>
</html>