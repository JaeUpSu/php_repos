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
            <p>로그인 | 회원가입</p>            
			<p>블로그에 오신 것을 환영합니다~~~</p>
	 	</div>
	</header>  <!-- end of header -->

  	<section id="content">    
		<div id="blog_write">
       	<form  name="blog_form" method="post" action="insert.php"> 
			<input type="hidden" name="id" value="<?=$id?>">
			<input type="hidden" name="nick_name" value="<?=$nick_name?>">
			<div class="textarea"><textarea name="content"></textarea></div>
			<div class="button"><button type="submit">글쓰기</button></div>
		</form>	
		</div>
		<div class="clear"></div>
		<div id="blog_content">
			<ul id="writer_info">
			<li>1</li>
			<li>홍길동</li>
			<li>20230120</li>
			<li> 
				<a href="#">[삭제]</a> 
			</li>
			</ul>
			<div>안녕하세요</div>
		</div>
			<div id="page_num"> ◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp; 
                <b> 1 </b>	
			&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶</div>
    </section> <!-- end of content -->
</div> <!-- end of wrap -->
</body>
</html>
