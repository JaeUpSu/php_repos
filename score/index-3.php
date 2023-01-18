<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
</head>
<body>
<h3>1) 성적 입력 하기</h3>
<form action="insert.php" method='post'>
<table border="1">
   <tr>     
      <td>  이름 : <input type="text" size="6" name="name">&nbsp;
            PHP : <input type="text" size="3" name="sub1">&nbsp;
            자바 : <input type="text" size="3" name="sub2">&nbsp;
            파이썬 : <input type="text" size="3" name="sub3">&nbsp;
            리액트 : <input type="text" size="3" name="sub4">&nbsp;
            장고 : <input type="text" size="3" name="sub5">&nbsp;
            C : <input type="text" size="3" name="sub6">&nbsp;
            DB : <input type="text" size="3" name="sub7">
      </td> 
      <td>
         <input type="submit" value="입력하기">	
      </td>
   </tr>
 </table>
 </form>

<p>
<h3>2) 성적 출력 하기</h3>  
 <!-- 제목 표시 시작 -->
 <table class="datas" border="1" >
   <tr>
      <th>번호</th>
      <th>이름</th>
      <th>PHP</th>
      <th>자바</th>
      <th>파이썬</th>
      <th>리액트</th>
      <th>장고</th>
      <th>C</th>
      <th>DB</th>
      <th>합계</th>
      <th>평균</th>
      <th>수정</th>
      <th>삭제</th>
   </tr>

   <?php 
      include "dbconn.php";
      $sql = "select * from score";

      $result = mysqli_query($conn, $sql);
      $number = 1;

      while ($row = mysqli_fetch_assoc($result)) {
         $num = $row["num"];
         $name = $row["name"];
         $sub1 = $row["sub1"];
         $sub2 = $row["sub2"];
         $sub3 = $row["sub3"];
         $sub4 = $row["sub4"];
         $sub5 = $row["sub5"];
         $sub6 = $row["sub6"];
         $sub7 = $row["sub7"];
         $sum = $row["sum"];
         $avg = $row["avg"];
   ?>
         <tr  align='center'>
            <form action="modify.php" method='post'>
               <input type="hidden" name="num" value="<?=$num?>">
               <td><?=$number?></td>  
               <td><input type="text" name="name" value="<?=$name?>"></td>
               <td><input type="text" name="sub1" value="<?=$sub1?>"></td>  
               <td><input type="text" name="sub2" value="<?=$sub2?>"></td>
               <td><input type="text" name="sub3" value="<?=$sub3?>"></td>  
               <td><input type="text" name="sub4" value="<?=$sub4?>"></td>
               <td><input type="text" name="sub5" value="<?=$sub5?>"></td>  
               <td><input type="text" name="sub6" value="<?=$sub6?>"></td>
               <td><input type="text" name="sub7" value="<?=$sub7?>"></td>  
               <td><?=$sum?></td>
               <td><?=$avg?></td>
               <td><button type="submit">수정</td>
            </form>
            <td><button onClick="location.href='delete.php?num=<?=$num?>'">삭제</td>
         </tr>
   <?php
         $number++;
      }
      mysqli_close($conn)
   ?>

</table>