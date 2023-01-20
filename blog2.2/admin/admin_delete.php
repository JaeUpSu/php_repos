<?php
   include "dbconn.php";

   $num = $_GET["num"];

   $sql = "delete from member where num = $num";
   mysqli_query($conn, $sql);

   mysqli_close($conn);

   echo "
	   <script>
	    location.href = 'admin.php';
	   </script>
	";
?>

