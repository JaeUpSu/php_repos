<?php
    $servername = "localhost";          // 서버명
    $username = "user";                 // 사용자명
    $password = "12345";                // 비밀번호
    $dbname = "sample";                 // DB명
  
    // MySQL 연결하기 (API 함수)
    $conn = mysqli_connect($servername, $username, $password, $dbname);
  
    // 연결 체크하기
    if (!$conn) {
        die("MySQL 연결 오류!");
    }
    
    echo "MySQL 연결 성공!";
    mysqli_close($conn);
?>