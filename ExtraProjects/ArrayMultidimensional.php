<?php
    $turma=array(
        array("Nome"=> "Maria", "Morada"=>"Rua A", "Idade"=>21),
        array("Nome"=> "Manuel", "Morada"=>"Rua B", "Idade"=>22),
        array("Nome"=> "Joaquina", "Morada"=>"Rua C", "Idade"=>32)
    );

foreach ($turma as $numero => $registo) {
    $cliente = $numero + 1; 

    foreach ($registo as $chave => $valor) {
        echo "cliente $cliente => O campo $chave tem o valor $valor<br>";
    }
}
?>
