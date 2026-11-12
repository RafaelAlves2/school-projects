<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    $a = 3;

    function ver()
    {
        $b = $a + 2;
        echo $b;
    }

    echo "Chamando a função ver(): ";
    ver();
    echo "<br>";
    echo $a;
    echo "<br>";
    echo $b;

    ?>

</body>
</html>