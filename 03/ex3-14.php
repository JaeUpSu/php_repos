<?php
    $sum = 0;
   	for ($i=1; $i<=10; $i++) {
        $sum += $i; 
        echo $sum." <= ".($sum-$i)." + ".$i."<br>";
    }

    echo "<br>1에서 10까지의 합계 : ".$sum;
?>