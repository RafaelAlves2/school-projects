<?php
    $associativo = array ( "Alexandre"=>16, "Beatrice"=>16, "Daniel"=>16, "David.C"=>16, "David.E"=>17, "Duarte"=>16, "Érica"=>16, "Fellype"=>16, "Francisco"=>16, "Gabriel"=>17, "Maria"=>17 ); // Array associativo

    foreach ($associativo as $nome => $idade)
    {
        //Imprime todo o conteúdo do array
        echo "Nome: " . $nome . " - Idade: " . $idade . " anos.<br>";
    }