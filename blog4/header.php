<?php
	session_start();
	if (isset($_SESSION["userid"])) 
		$userid = $_SESSION["userid"];
	else 
		$userid = "";
	
	if (isset($_SESSION["username"])) 
        $username = $_SESSION["username"];
    else 
        $username = "";	
?>
<!DOCTYPE HTML>
<html>
<head> 
<meta charset="utf-8">
<link href="style.css" rel="stylesheet" type="text/css" media="all">
</head>
<body style="background-color: whitesmoke;">
<div id="wrap" style="background-color: whitesmoke;;">
    <header style="border: 0px; padding-top: 10px">
	  	<div id="logo"><a href="index.php"><p style="color: orange; font-size:25px;">HS Code</p></a></div>
		<div id="top">
		<?php
    if(!$userid) {
?>                
        <a href="member/login_form.php">로그인</a> |<a href="member/form.php">회원가입</a>
<?php
    } else {
?>
        <a href="member/logout.php">로그아웃</a> | <a href="member/modify_form.php">정보수정</a>
<?php
		if ($userid=="admin")
			echo " | <a href='admin/admin.php'>회원관리</a>";
    }
?>    	
			<br>
			<b><?=$userid?></b> 블로그에 오신 것을 환영합니다~~~
	 	</div>
		 <div class="clear"></div>
		 <ul id ="menu" style="width: 100%; margin-top: 25px; margin-bottom: 20px;"> 
		 	<li><a style="font-size:30px; padding-right: 60px; border-right: 2px solid black;" href="index.php">🏠<p style="font-size:15px;">전체글</p></a></li>

            <li><a style="font-size:30px;" href="index.php?cat=food">🍔<p style="font-size:15px;">음식</p></a></li>
            <li><a style="font-size:30px;" href="index.php?cat=computer">💻<p style="font-size:15px;">컴퓨터</p></a></li>
            <li><a style="font-size:30px;" href="index.php?cat=book">📓<p style="font-size:15px;">도서</p></a></li>
			<li><a style="font-size:30px;" href="index.php?cat=talk">🧐<p style="font-size:15px;">이모저모</p></a></li>
			<li><a style="font-size:30px;" href="index.php?cat=notice">📌<p style="font-size:15px;">공지사항</p></a></li>
        </ul>			
    </header>  <!-- end of header -->