<!DOCTYPE HTML>
<html>
<head> 
<meta charset="utf-8">
<link href="blog.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>
<div id="wrap">
  	<header>
	  	<div id="logo"><a href="index.php"><img src="img/logo.png"></a></div>
		<div id="top">
            <?php 
                session_start();
                if (isset($_SESSION["userid"])) {
					$userid = $_SESSION["userid"];
					$username = $_SESSION["username"];
            ?>
            
            <a href="modify_form.php"><?=$userid."님의 "?>정보수정</a>    
                <span> | </span>
            <a href="logout.php" onclick="#">로그아웃</a>

            <?php 
					if($userid == "admin") {
			?>
			<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="./admin/admin.php" onclick="#">회원정보 보러가기</a>
			<?php
					}
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
		<div style="margin-top:20px;">
			<a href='index.php?'>전체</a>&nbsp;&nbsp;&nbsp;&nbsp;

			<?php $cat = "food"; ?>	
			<a href='index.php?cat=<?=$cat?>'>음식</a>&nbsp;&nbsp;&nbsp;&nbsp;
			
			<?php $cat = "music"; ?>
			 <a href='index.php?cat=<?=$cat?>'>음악</a>&nbsp;&nbsp;&nbsp;&nbsp;
			 
			<?php $cat = "movie"; ?>
			 <a href='index.php?cat=<?=$cat?>'>영화</a>
		</div> 
		<div id="blog_write">
       	<form  name="blog_form" method="post" action="insert.php"> 
			<input type="hidden" name="id" value="<?=$userid?>">
			<input type="hidden" name="name" value="<?=$username?>">
			<div>
				<select name="cat">
					<option value="">선택</option>
					<option value="food">음식</option>
					<option value="music">음악</option>
					<option value="movie">영화</option>
				</select>
			</div>
			<div class="textarea"><textarea name="content"></textarea></div>
			<?php
				if(isset($_SESSION["userid"])) {
			?>
			<div class="button"><button type="submit">글쓰기</button></div>
			<?php	
				} else {
			?>
			<div class="button"><button type="submit" disabled="check">로그인 필요</button></div>
			<?php	
				}
			?>
		</form>	
		</div>
		<div class="clear"></div>
		<div id="blog_content">
<?php				
    $con = mysqli_connect("localhost","user","12345","sample");
    $sql = "select * from blog2 order by num desc";

	if(isset($_GET["cat"])) {
		$cat = $_GET["cat"];
		$sql = "select * from blog2 where cat='$cat' order by num desc";
	} else {
		$sql = 'select * from blog2 order by num desc';
	}

	$result = mysqli_query($con, $sql);	
    $total_number = mysqli_num_rows($result);
	$scale = 5;			

	if($total_number % $scale == 0)
		$total_page = floor($total_number/$scale);
	else
		$total_page = floor($total_number/$scale) + 1;			

	if (isset($_GET["page"])) $page = $_GET["page"];
	else $page = 1;


	// echo $page;
	// exit;

	$start = ($page-1) * $scale;
	$number = $total_number - $start;

	// echo $start." ".$number." ".$page." ".$total_number." ".$total_page;
	// exit;

    // while ($row = mysqli_fetch_assoc($result)) {
	for($i=$start; $i<$start+$scale && $i < $total_number; $i++) {
		mysqli_data_seek($result, $i);
		$row = mysqli_fetch_assoc($result);	

        $num = $row["num"];
        $name = $row["nick_name"];
        $content = $row["content"];
		$cat = $row["cat"];
		$regist_day = $row["regist_day"];

		// $content = str_replace("\n","<br>",$content);
		// $content = str_replace(" ","&nbsp",$content);
?>		
		<ul id="writer_info" >
			<li><?=$number?></li>
			<li><?=$name?></li>
			<li>[<?=$cat?>]</li>
			<li><?=$regist_day?></li>
			<li> 
				<a style="color:blue; cursor:pointer;" onClick="location.href='delete.php?num=<?=$num?>'">[삭제]</a> 
			</li>
		</ul>
		<div style="margin-top:10px; margin-bottom:25px; padding: 5px; padding-bottom:20px; border-bottom: 1px solid gray;"><?=$content?></div>
<?php
		$number--;
	}
?>
			
		</div>
			<div id="page_num">  
<?php
	
	if ($page > 1) {
		$prev_page = $page-1;
		echo "<a href='index.php?page=$prev_page'>◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp;</a>";
	}
	for ($i=1; $i<=$total_page; $i++) {
		if($page == $i) {
			echo "<b style='cursor:pointer'>$i</b>";
		} else {
			echo "<a style='cursor:pointer' href='index.php?page=$i'>$i</a>";
		}
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}
	if ($page < $total_page) {
		$next_page = $page+1;
		echo "<a href='index.php?page=$next_page'>다음 ▶</a>";
	}
?>	
    </section> <!-- end of content -->
</div> <!-- end of wrap -->
</body>
</html>
