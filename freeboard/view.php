<?php
	

	if (isset($_GET["num"]))
		$num = $_GET["num"];
	else
		$num = "";

	include "dbconn.php";

	$sql = "select * from freeboard where num=$num";
	$result = mysqli_query($conn, $sql);

	$row = mysqli_fetch_assoc($result);

	$name = $row["name"];
	$subject = $row["subject"];
	$regist_day = $row["regist_day"];
	$content = str_replace(" ", "&nbsp;", $row["content"]);
	$content = str_replace("\n", "<br>", $content);
?>	
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP+데이터베이스 입문</title>
<link rel="stylesheet" href="style.css">
<script>
	function check_password(mode, num) {
		// mode : modify(수정) delete(삭제), num : 레코드 번호
     	window.open("password_form.php?mode="+mode+"&num="+num,
         "pass_check",
          "left=700,top=300,width=550,height=150,scrollbars=no,resizable=yes");
   }
</script>   
</head>
<body> 
	<h2>자유 게시판 > 내용보기</h2>
	<ul class="board_view">
		<li class="row1">
			<span class="col1"><b>제목 :</b> <?=$subject?></span>	<!-- 제목 출력 -->
			<span class="col2"><?=$name?> | <?=$regist_day?></span>	<!-- 이름, 작성일 출력 -->
		</li>
		<li class="row2">
			<?=$content?>	 <!-- 내용 출력 -->
		</li>		
	</ul>
	<ul class="buttons">
		<li><button onclick="location.href='list.php'">목록보기</button></li>
		<li><button onclick="check_password('modify', '<?=$num?>')">수정하기</button></li>   
		<li><button onclick="check_password('delete', '<?=$num?>')">삭제하기</button></li>
		<li><button onclick="location.href='form.php'">글쓰기</button></li>
	</ul>
</body>
</html>
