<?php
    $teste=array ();
    for($i=0;$i<100;$i++)
    {
        $teste[$i]=$i+1;
    }
    echo "Array Preenchido<br>";
?>

<?php
    for($i=0;$i<100;$i++)
    {
        echo $teste[$i];
        echo "<br>";
    }
    echo "Fim do Array";
?>