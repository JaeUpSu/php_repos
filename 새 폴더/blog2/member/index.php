<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<script>
    // function log_out() {
    //     unset($_SESSION["userid"]);
    //     echo "세션 접속 해제";
    // }
</script>
</head>
<body>
    <div class="header">
        <h3 class="logo">
            <a href="index.php">OZ코딩스쿨</a>
        </h3>
        <div class="top">     
            <?php 
                session_start();
                if (isset($_SESSION["userid"])) {
            ?>
            
            <a href="modify_form.php"><?=$_SESSION["userid"]."님의 "?>정보수정</a>    
                <span> | </span>
            <a href="logout.php" onclick="#">로그아웃</a>

            <?php 
                } else {
            ?>

                <a href="form.php">회원가입</a>
                <span> | </span>
                <a href="login_form.php">로그인</a>
            
            <?php 
                }
            ?>
        </div> <!-- top -->
    </div> <!-- header -->
</body>
</html>