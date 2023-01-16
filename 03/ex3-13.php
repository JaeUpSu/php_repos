<?php

    echo "<br> odd <br><br>";

   	for ($i=1; $i<=100; $i+=2) {
        echo $i."<br>";
    }
    
    echo "<br> even <br><br>";

    for ($i=1; $i<=100; $i++) {
        if ($i % 2 == 0)
            echo $i."<br>";
    }
?>