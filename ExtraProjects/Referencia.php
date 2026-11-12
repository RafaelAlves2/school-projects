<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

    function Quadrado(&$valor)
    {
        $val_original=$valor;
        $valor*=$val_original;
        echo "Quadrado de $val_original é: ".$valor;
    }

    $valor=12;
    Quadrado($valor);
    echo "<br>$valor";

    ?>

</body>
</html>