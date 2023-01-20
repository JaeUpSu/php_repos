<!DOCTYPE HTML>
<html>
<head> 
<meta charset="utf-8">
<link href="blog.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>
    <div id="wrap">
        <header>
            <div id="logo"><a href="_index.php"><img src="img/logo.png"></a></div>
            <div id="top">
                <?php 
                    session_start();
                    if (isset($_SESSION["userid"])) {
                        $userid = $_SESSION["userid"];
                        $username = $_SESSION["username"];
                ?>
                
                <a href="_index.php">홈</a>    
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
            </div>
        </header>  <!-- end of header -->
    
        <section id="content">
            <h3> 고객 목록</h3>  
            <form action="admin.php?mode=search" method="post">
                <select name="select">
                    <option value="id">아이디</option>
                    <option value="name">이름</option>
                </select>
                <input type="text" name="keyword" size="50"> 
                <button type="submit">찾기</button><br><br>
            </form>
            
            <table border="1">
                <tr>
                    <th>번호</th>
                    <th>ID</th>
                    <th>이름</th>
                    <th>email</th>
                    <th>created</th>
                    <th>수정</th>
                    <th>삭제</th>
                </tr>    
                <?php

                    if(isset($_GET["mode"])) $mode = $_GET["mode"];
                    else $mode = "";

                    if(isset($_POST["select"])) $select = $_POST["select"];
                    else $select = "";

                    if(isset($_POST["keyword"])) $keyword = $_POST["keyword"];
                    else $keyword = "";

                    include "dbconn.php";
                    
                    $sql = "select * from member";

                    if ($mode=="search") 
                        $sql = "select * from member where $select='$keyword'";   

                    $result = mysqli_query($conn, $sql);
                    $number = 1;

                    while ($row = mysqli_fetch_assoc($result)) {
                        $num = $row["num"];
                        $id = $row["id"];
                        $name = $row["name"];
                        $email = $row["email"];
                        $regist_day = $row["regist_day"];
                    ?>
                        <tr>    
                            <form action="modify_admin.php" method='post'>
                                <input type="hidden" name="num" value="<?=$num?>">
                                <td><?=$number?></td>
                                <td><?=$id?></td>
                                <td><input type="text" name="name" value="<?=$name?>"></td>
                                <td><input type="text" name="email" value="<?=$email?>"></td>
                                <td><?=$regist_day?></td>
                                <td><button type="submit">수정</td>
                            </form>
                            <td><button onClick="location.href='delete_admin.php?num=<?=$num?>'">삭제</td>
                        </tr>
                <?php
                        $number++;
                    }

                    mysqli_close($conn);
                ?>
                </table>
  
            </section>
        </div>
</body>