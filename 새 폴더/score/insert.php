<?php

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

    $sql = "insert into score (";
    $sql .= "name, ";
    $sql .= "sub1, ";
    $sql .= "sub2, ";
    $sql .= "sub3, ";
    $sql .= "sub4, ";
    $sql .= "sub5, ";
    $sql .= "sub6, ";
    $sql .= "sub7, ";
    $sql .= "sum, ";
    $sql .= "avg) values";   
    $sql .= "('$name',$sub1,$sub2,$sub3,$sub4,$sub5,$sub6,$sub7,$sum,$avg)";

    $result = mysqli_query($conn, $sql);

    if ($result)
        echo "DB 레코드 삽입 완료!";
    else
        echo "DB 레코드 삽입 오류!";
    
    mysqli_close($conn);

    echo "
        <script>location.href='index-3.php'</script>
    ";
?>