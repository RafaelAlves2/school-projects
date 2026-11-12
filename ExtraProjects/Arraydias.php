<?php
    $teste=array ();
    for($i=0;$i<30;$i++)
    {
        $teste[$i]= "Dia=>" .($i+1);
    }
    echo "Array Preenchido<br>";
?>

<?php
    for($i=0;$i<30;$i++)
    {
        echo $teste[$i];
        echo "<br>";
    }
    echo "Fim do Array";
?>