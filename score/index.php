<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<h3>1) 성적 입력 하기</h3>
<form action="" method='post'>
<table border="1">
   <tr>     
      <td>  이름 : <input type="text" size="6" name="name">&nbsp;
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

<p>
<h3>2) 성적 출력 하기</h3>  
 <!-- 제목 표시 시작 -->
 <table border="1" >
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
 </tr>
</table>