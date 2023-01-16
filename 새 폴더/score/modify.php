<?php

    $num = $_POST["num"];

    $name = $_POST["name"];
    $sub1 = $_POST["sub1"];
    $sub2 = $_POST["sub2"];
    $sub3 = $_POST["sub3"];
    $sub4 = $_POST["sub4"];
    $sub5 = $_POST["sub5"];
    $sub6 = $_POST["sub6"];
    $sub7 = $_POST["sub7"];
    $sum = $sub1 + $sub2 + $sub3 + $sub4 + $sub5 + $sub6 + $sub7;
    $avg = $sum / 7;
   

    include "dbconn.php";

    $sql = "update score set ";
    $sql .= "name='$name', ";
    $sql .= "sub1=$sub1, ";
    $sql .= "sub2=$sub2, ";
    $sql .= "sub3=$sub3, ";
    $sql .= "sub4=$sub4, ";
    $sql .= "sub5=$sub5, ";
    $sql .= "sub6=$sub6, ";
    $sql .= "sub7=$sub7, ";
    $sql .= "sum=$sum, ";
    $sql .= "avg=$avg "; 
    $sql .= "where num=$num";   
    

    $result = mysqli_query($conn, $sql);

    if ($result)
        echo "DB 레코드 수정 완료!";
    else
        echo "DB 레코드 수정 오류!";
    
    mysqli_close($conn);

    echo "
        <script>location.href='index-3.php'</script>
    ";
?>