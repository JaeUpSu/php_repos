<?php
$myfile = fopen("customer_table.sql", "r") or die("파일 읽기 오류!");

$data = "";
while(!feof($myfile)) {
    $data .= fgets($myfile);
}
// echo $data;
fclose($myfile);

$servername = "localhost";          // 서버명
$username = "user";                 // 사용자명
$password = "12345";                // 비밀번호
$dbname = "sample";                 // DB명

// MySQL 연결하기
$conn = mysqli_connect($servername, $username, $password, $dbname);
$result = mysqli_query($conn, $data);

if ($result)
    echo "DB 테이블 생성 완료!";
else
    echo "DB 테이블 생성 오류!";

mysqli_close($conn);
?>