<?php
$lista = array(17, 20, 4, 9, 11, 1, 3, 8, 15, 6);


foreach($lista as $valor) {
    echo $valor . "<br>";
}

echo "<br>Maior: " . max($lista) . "<br><br>";
echo "Menor: " . min($lista) . "<br><br>";


$lista_ordenada = $lista;
sort($lista_ordenada);

echo "Lista ordenada:<br>";
foreach($lista_ordenada as $valor) {
    echo $valor . "<br>";
}


$media = array_sum($lista) / count($lista);

echo "<br>Média: " . $media;
?>
