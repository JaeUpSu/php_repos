<?php
    include "dbconn.php";

    $name = $_POST["name"];
    $sub1 = $_POST["sub1"];
    $sub2 = $_POST["sub2"];
    $sub3 = $_POST["sub3"];
    $sub4 = $_POST["sub4"];
    $sub5 = $_POST["sub5"];

    $sum = $sub1 + $sub2 + $sub3 + $sub4 + $sub5;           // 합계 구하기
    $avg = $sum/5;                           		// 평균 구하기

    $sql = "insert into score (name, sub1, sub2, sub3, sub4, sub5, sum, avg) values";
    $sql .= "('$name', $sub1, $sub2, $sub3, $sub4, $sub4, $sum, $avg)";

    $result = mysqli_query($conn, $sql);

    if ($result)
        echo "레코드 삽입 완료!";
    else
        echo "레코드 삽입 오류!";
    
    mysqli_close($conn);

    echo "
        <script>
            location.href='index3.php';
        </script>
    ";
?>