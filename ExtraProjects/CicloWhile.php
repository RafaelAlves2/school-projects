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
        while($i <= 16){
            echo "Número: " . $i . "<br>";
            $i++;
        }

        $i = 23;
        while($i <= 25){
            echo "Número: " . $i . "<br>";
            $i++;
        }

        $i = 0;
        while($i <= 20){
            echo "Número: " . $i . "<br>";
            $i += 2;
        }
    ?>

</body>
</html>
