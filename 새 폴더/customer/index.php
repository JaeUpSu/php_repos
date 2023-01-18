<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<h3> 고객 목록</h3>  
<form action="index.php?mode=search" method="post">
<input type="text" name="command" size="50"> 
<button type="submit">검색(SQL 명령)</button><br><br>
</form>
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
 <th>수정</th>
 <th>삭제</th>
 </tr>    
<?php
    if(isset($_GET["mode"])) $mode = $_GET["mode"];
    else $mode = "";

    if(isset($_POST["command"])) $command = $_POST["command"];
    else $command = "";

    include "dbconn.php";
    
    $sql = "select * from customer";

    if ($mode=="search" && $command!="") 
        $sql = $_POST["command"];   

    $result = mysqli_query($conn, $sql);
    $number = 1;

    while ($row = mysqli_fetch_assoc($result)) {
        $num = $row["num"];
        $name = $row["name"];
        $tel = $row["tel"];
        $address = $row["address"];
        $gender = $row["gender"];
        $age = $row["age"];
        $mileage = $row["mileage"];
?>
        <tr>    
            <form action="modify.php" method='post'>
                <input type="hidden" name="num" value="<?=$num?>">
                <td><?=$number?></td>
                <td><?=$name?></td>
                <td><?=$tel?></td>
                <td><?=$address?></td>
                <td><?=$gender?></td>
                <td><input type="text" name="age" value="<?=$age?>"></td>
                <td><input type="text" name="mileage" value="<?=$mileage?>"></td>
               <td><button type="submit">수정</td>
            </form>
            <td><button onClick="location.href='delete.php?num=<?=$num?>'">삭제</td>
        </tr>
<?php
        $number++;
    }

    mysqli_close($conn);
?>
</table>
