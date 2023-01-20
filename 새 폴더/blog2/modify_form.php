<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
<script>
	function check_modify() {
		if (!document.member.pass.value) {
			alert("비밀번호를 입력하세요");    
			document.member.pass.focus();
			return;
		}
		
		document.member.submit();
	}
	function cancel() {
		history.go(-1);
	}
</script>	
</head>
<body> 
	<?php
		session_start();
		if(isset($_SESSION["userid"]))
			$userid = $_SESSION["userid"];
		else
			$userid = "";

		$con = mysqli_connect("localhost", "user", "12345", "sample");
		$sql = "select * from member where id ='$userid'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);

		$pass = $row["pass"];
		$name = $row["name"];
		$email = $row["email"];

		mysqli_close($con);
	?>

	<form name="member" action="modify.php" method="post">		       	
    	<h2 class="join_title">회원 정보 수정</h2>
        <ul class="join_form">
            <li>
				<span class="col1">아이디</span>
				<span class="col2"><?=$userid?></span>
			</li>	
			<li>			
				<span class="col1">비밀번호</span>
				<span class="col2"><input type="password" name="pass" value = <?=$pass?>></span>
			</li>	
			<li>			
				<span class="col1">비밀번호 확인</span>
				<span class="col2"><input type="password" name="pass_confirm" placeholder="비밀번호"></span>
			</li>
			<li>			
				<span class="col1">이름</span>
				<span class="col2"><input type="text" name="name" value = <?=$name?>></span>
			</li>
			<li>			
				<span class="col1">이메일</span>
				<span class="col2"><input type="text" name="email" value = <?=$email?>></span>
			</li>
        </ul>	
        <div align='center' style="margin-top: 20px;">    	
            <button type="button" onclick="check_modify()">정보수정</button>
            <button type="button" onclick="cancel()">취소</button>
        </div>  
	</form>
</body>
</html>

