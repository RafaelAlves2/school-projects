<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    echo "Os seus dados são os seguintes:<br>";
    foreach ($_POST as $chave => $valor)
        echo $chave. ": ".$valor."<br>";
    ?>
    
</body>
</html>