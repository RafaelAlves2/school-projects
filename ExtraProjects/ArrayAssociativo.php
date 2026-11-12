<?php
    $associativo = array ( "Joana"=>24, "Carlos"=>30, "Ana"=>22 ); // Array associativo

    echo "O Carlos tem " . $associativo["Carlos"] . " anos.";
    echo "<br>";

    foreach ($associativo as $nome => $idade)
    {
        //Imprime todo o conteúdo do array
        echo "Nome: " . $nome . " - Idade: " . $idade . " anos.<br>";
    }