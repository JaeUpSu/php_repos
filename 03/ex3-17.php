<?php
    echo "<table border='1'>";
    echo "<tr><th width='100'>섭씨</th><th width='100'>화씨</th>";

    for ($c=-10; $c<= 30; $c+=5) {
        $f = ($c * 9/5) + 32;       // $f : 화씨
        echo "<tr><th>$c</th><th>$f</th>";
    }
    echo "</table>"; 
    
    // echo "<table border='1'>";
    // echo "<tr><th width='100'>인치</th><th width='100'>CM</th>";

    // for ($inch=10; $inch<= 100; $inch+=10) {
    //     $cm = ($inch * 2.54);       
    //     echo "<tr><th>$inch</th><th>$cm</th>";
    // }
    // echo "</table>"; 
?>