<?php
    $num = $_GET["num"];

    $name = $_POST["name"];
    $email = $_POST["email"];
    $level = $_POST["level"];
    $point = $_POST["point"];
          
    $con = mysqli_connect("localhost", "user", "12345", "sample");

    $sql = "update member set name='$name', email='$email', level=$level, point=$point";
    $sql .= " where num='$num'";
    mysqli_query($con, $sql);

    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'admin.php';
	      </script>
	  ";
?>