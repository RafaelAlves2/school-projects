<?php
    $teste=array ();
    for($i=0;$i<10;$i++)
    {
        $teste[$i]= ($i+1)*2;
    }
    echo "Array Preenchido<br>";
?>

<?php
    for($i=0;$i<10;$i++)
    {
        echo $teste[$i];
        echo "<br>";
    }
    echo "Fim do Array";
?>