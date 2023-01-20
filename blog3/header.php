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
<body>
<div id="wrap">
    <header>
	  	<div id="logo"><a href="index.php"><img src="img/logo.png"></a></div>
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
		 <ul id ="menu"> 
		 	<li><a href="index.php">전체글</a></li>
			 <li>|</li>
            <li><a href="index.php?cat=food">음식</a></li>
            <li><a href="index.php?cat=computer">컴퓨터</a></li>
            <li><a href="index.php?cat=book">도서</a></li>
			<li><a href="index.php?cat=talk">이모저모</a></li>
			<li><a href="index.php?cat=notice">공지사항</a></li>
        </ul>			
    </header>  <!-- end of header -->