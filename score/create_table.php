<?php
    include "dbconn.php";

    $sql = "create table score ( ";
    $sql .= "num int not null auto_increment, ";
    $sql .= "name char(12), ";
    $sql .= "sub1 int, ";
    $sql .= "sub2 int, ";
    $sql .= "sub3 int, ";
    $sql .= "sub4 int, ";
    $sql .= "sub5 int, ";
    $sql .= "sub6 int, ";
    $sql .= "sub7 int, ";
    $sql .= "sum int, ";
    $sql .= "avg float, ";   
    $sql .= "primary key(num) )";

    $result = mysqli_query($conn, $sql);

    if ($result)
        echo "DB 테이블 생성 완료!";
    else
        echo "DB 테이블 생성 오류!";
    
    mysqli_close($conn);
?>