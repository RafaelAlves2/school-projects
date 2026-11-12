<?php

$turma = array(
    array("Português" => 15, "Inglês" => 14, "Matemática" => 18, "Educação Física" => 17),
    array("Português" => 12, "Inglês" => 10, "Matemática" => 14, "Educação Física" => 16),
    array("Português" => 18, "Inglês" => 17, "Matemática" => 19, "Educação Física" => 18),
    array("Português" => 10, "Inglês" => 11, "Matemática" => 12, "Educação Física" => 14),
    array("Português" => 16, "Inglês" => 15, "Matemática" => 17, "Educação Física" => 18),
    array("Português" => 14, "Inglês" => 13, "Matemática" => 16, "Educação Física" => 15)
);

foreach ($turma as $numero => $aluno) {
    $nAluno = $numero + 1;

    foreach ($aluno as $disciplina => $nota) {
        echo "aluno $nAluno => A disciplina $disciplina tem a classificação $nota<br>";
    }

    echo "<br>"; 
}

?>
