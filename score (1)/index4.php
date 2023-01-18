<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<h3>1) 성적 입력 하기</h3>
<form action="insert.php" method="post">
<table border="1">
    <tr><td> 이름 : <input type="text" size="6" name="name">&nbsp;
             PHP : <input type="text" size="3" name="sub1">&nbsp;
             자바 : <input type="text" size="3" name="sub2">&nbsp;
             파이썬 : <input type="text" size="3" name="sub3">&nbsp;
             C : <input type="text" size="3" name="sub4">&nbsp;
             DB : <input type="text" size="3" name="sub5">
	</td>
       <td>
	    <input type="submit" value="입력하기">	
       </td>
    </tr>
 </table>
 </form>
 <?php
    include "dbconn.php";

    if(isset($_GET["sort"]))
        $sort = $_GET["sort"];
    else 
        $sort = "";

    if ($sort=="name_asc")
        $sql = "select * from score order by name";
    elseif ($sort=="name_desc")
        $sql = "select * from score order by name desc";
    elseif ($sort=="avg_desc")
        $sql = "select * from score order by avg desc";
    else
        $sql = "select * from score";

    $result = mysqli_query($conn, $sql);    
    $number = 1;
?>
<h3>2) 성적 출력 하기</h3>  
<button onClick="location.href='index4.php?sort=name_asc'">오름차순 정렬(이름순)</button>
<button onClick="location.href='index4.php?sort=name_desc'">내림차순 정렬(이름순)</button>
<button onClick="location.href='index4.php?sort=avg_desc'">내림차순 정렬(성적순)</button><br><br>
 <!-- 제목 표시 시작 -->
 <table border="1">
 <tr>
 <th>번호</th>
 <th>이름</th>
 <th>PHP</th>
 <th>자바</th>
 <th>파이썬</th>
 <th>C</th>
 <th>DB</th>
 <th>합계</th>
 <th>평균</th>
 <th>삭제</th>
 </tr>    
<?php
    while ($row = mysqli_fetch_assoc($result)) {
        $num = $row["num"];
        $name = $row["name"];
        $sub1 = $row["sub1"];
        $sub2 = $row["sub2"];
        $sub3 = $row["sub3"];
        $sub4 = $row["sub4"];
        $sub5 = $row["sub5"];
        $sum = $row["sum"];
        $avg = $row["avg"];
?>
        <tr>
        <td><?=$number?></td>
        <td><?=$name?></td>
        <td><?=$sub1?></td>
        <td><?=$sub2?></td>
        <td><?=$sub3?></td>
        <td><?=$sub4?></td>
        <td><?=$sub5?></td>
        <td><?=$sum?></td>
        <td><?=$avg?></td>
        <td><button onClick="location.href='delete.php?num=<?=$num?>'">삭제</button></td>
        </tr>
<?php
        $number++;
    }

    mysqli_close($conn);
?>
</table>