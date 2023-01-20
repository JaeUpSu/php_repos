<?php
	session_start();
	if (isset($_SESSION["userid"])) 
		$userid = $_SESSION["userid"];
	else 
		$userid = "";

	if (isset($_SESSION["name"])) 
        $name = $_SESSION["name"];
    else 
        $name = "";	

	$scale=5;			// 한 화면에 표시되는 글 수
	include "dbconn.php";

	$sql = "select * from blog order by num desc";
	$result = mysqli_query($conn, $sql);

	$total_record = mysqli_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (isset($_GET["page"])) $page = $_GET["page"];
	else $page = 1;
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      

	$number = $total_record - $start;
?>
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
    if(!$userid) {
?>                
        <a href="login_form.php">로그인</a> |<a href="#">회원가입</a>
<?php
    } else {
?>
        <a href="logout.php">로그아웃</a> | <a href="#">정보수정</a>
<?php
		if ($userid=="admin")
			echo " | <a href='admin.php'>회원관리</a>";
    }
?>    	
			<br>
			<b><?=$userid?></b> 블로그에 오신 것을 환영합니다~~~
	 	</div>
	</header>  <!-- end of header -->

  	<section id="content">    
		<div id="blog_write">
       	<form  name="blog_form" method="post" action="insert.php"> 
			<input type="hidden" name="userid" value="<?=$userid?>">
			<input type="hidden" name="name" value="<?=$name?>">
			<div class="textarea"><textarea name="content"></textarea></div>
			<div class="button"><button type="submit">글쓰기</button></div>
		</form>	
		</div>
		<div class="clear"></div>
<?php		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysqli_data_seek($result, $i);       
      $row = mysqli_fetch_assoc($result);       
	  $num     = $row["num"];
	  $id      = $row["id"];
	  $name    = $row["nick_name"];	  
      $regist_day    = $row["regist_day"];
	  $content = str_replace("\n", "<br>", $row["content"]);
	  $content = str_replace(" ", "&nbsp;", $content);
?>
		<div id="blog_content">
			<ul id="writer_info">
			<li><?= $number ?></li>
			<li><?= $name ?></li>
			<li><?= $regist_day ?></li>
			<li><a href="delete.php?num=<?=$num?>">[삭제]</a></li>
			</ul>
			<div><?= $content ?></div>
		</div>
<?php
		$number--;
	 }
	 mysqli_close($conn);
?>

			<div id="page_num"> 
<?php
	if ($page>1) {
		$pre_page = $page-1;
		echo "<a href='index.php?page=$pre_page'>◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp;</a>"; 
	}

   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{			echo "<b> $i </b>";		}
		else
		{ 			echo "<a href='index.php?page=$i'> $i </a>";		}      
   }
   if ($page<$total_page) {
		$next_page = $page+1;
		echo "<a href='index.php?page=$next_page'>&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶</a>"; 
	}
?>			
</section> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
