<?php
    session_start();
    if (isset($_SESSION["userid"])) 
        $userid = $_SESSION["userid"];
    else 
        $userid = "";
?>	
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
</head>
<body>
<?php
    if(!$userid) {
?>                
        <a href="form.php">회원가입</a> | <a href="login_form.php">로그인</a>
<?php
    } else {
?>
        <?=$userid?>님 | <a href="logout.php">로그아웃</a> | <a href="modify_form.php">정보수정</a>
<?php
    }
?>
</body>
</html>