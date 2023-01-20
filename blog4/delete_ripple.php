<?php
      include "dbconn.php";

      $num = $_GET["num"];

      $sql = "delete from blog_ripple where num=$num";
      mysqli_query($conn, $sql);
      mysqli_close($conn);

      echo "
	   <script>
	    location.href = 'index.php';
	   </script>
	  ";
?>


