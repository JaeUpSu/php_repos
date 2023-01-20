<?php
	$userid = $_POST["userid"];
	$name = $_POST["name"];

	$content = $_POST["content"];
	if(!$userid) {
		echo("
	   <script>
	     window.alert('로그인 후 이용하세요.')
	     history.go(-1)
	   </script>
		");
	 exit;
	}
	if(!$content) {
		echo("
	   <script>
	     window.alert('내용을 입력하세요.')
	     history.go(-1)
	   </script>
		");
	 exit;
	}

	$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

	include "dbconn.php";       // dconn.php 파일을 불러옴

	$sql = "insert into blog (id, nick_name, content, regist_day) ";
	$sql .= "values('$userid', '$name', '$content', '$regist_day')";

	//echo $sql;
	//exit;

	mysqli_query($conn, $sql);  // $sql 에 저장된 명령 실행

	mysqli_close($conn);                // DB 연결 끊기

	echo "
	   <script>
	    location.href = 'index.php';
	   </script>
	";
?>

  
