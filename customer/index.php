<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<h3> 고객 목록</h3>  
 <!-- 제목 표시 시작 -->
 <table border="1">
 <tr>
 <th>번호</th>
 <th>이름</th>
 <th>전화번호</th>
 <th>주소</th>
 <th>성별</th>
 <th>나이</th>
 <th>마일리지</th>
 </tr>    
<?php
    include "dbconn.php";
        echo "
        <tr>
        <td>1</td>
        <td>홍길동</td>
        <td>0103089333</td>
        <td>서울</td>
        <td>남성</td>
        <td>25</td>
        <td>1000</td>
        </tr>
        ";

    mysqli_close($conn);
?>
</table>

