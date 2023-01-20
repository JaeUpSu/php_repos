<?php

    session_start();

    $num = $_GET["num"];
    $name = $_POST["name"];
    $subject = $_POST["subject"];
    $content = $_POST["content"];

	include "dbconn.php";
	
    $sql = "update freeboard set name='$name', subject='$subject', content='$content'";
    $sql .= " where num=$num";


    mysqli_query($conn, $sql);
    mysqli_close($conn);
	
	echo "
	   <script>
	    location.href = 'list.php';
	   </script>
	";
?>