<?php
$myfile = fopen("customer_data.sql", "r") or die("파일 읽기 오류!");
// $myfile = fopen("customer_table.sql", "r") or die("파일 읽기 오류!");
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
fclose($myfile);
?>