<?php
   include "dbconn.php";

   $num = $_GET["num"];

   $sql = "delete from blog2 where num = $num";
   mysqli_query($conn, $sql);

   mysqli_close($conn);

   echo "
	   <script>
	    location.href = 'index.php';
	   </script>
	";
?>

