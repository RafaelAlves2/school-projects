<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primeiro Trabalho</title>
</head>
<body>
   
    <?php
        $nome = "Fellype";
        $numeroAluno = 9;

        echo "<br><h2>Aluno nº$numeroAluno faz Tabuada do $numeroAluno</h2>";

        for ($i = 1; $i <= 10; $i++) {
            echo "$numeroAluno x $i = " . ($numeroAluno * $i) . "<br>";
        }
    ?>

    <div style="position: absolute; bottom: 10px; width: 100%; text-align: center; font-size: 18px;">
        <?php echo $nome; ?>
    </div>

    <div style="position: absolute; top: 10px; left: 10px; font-weight: bold;">
        <?php echo date('d/m/Y'); ?>
    </div>

</body>
</html>
