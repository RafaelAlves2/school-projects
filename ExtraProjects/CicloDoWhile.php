<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        $i = 1;
        do {
            echo "Número= " . $i . "<br/>";
            $i++;
        } while($i <= 16);

        $i = 1;
        do {
            echo "Número: " . $i . "<br>";
            $i += 2;
        } while($i <= 20);
    ?>

</body>
</html>