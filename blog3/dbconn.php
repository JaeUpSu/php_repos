<?php
    $servername = "localhost";          // 서버명
    $user_name = "user";                 // 사용자명
    $password = "12345";                // 비밀번호
    $dbname = "sample";                 // DB명

    // MySQL 연결하기
    $conn = mysqli_connect($servername, $user_name, $password, $dbname);
?>
