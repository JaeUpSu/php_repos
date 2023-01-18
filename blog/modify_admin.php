<?php
    session_start();

    $num = $_POST["num"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    
    $con = mysqli_connect("localhost","user","12345","sample");

    $sql = "update member set name='$name', email='$email'";
    $sql .= " where num='$num'";


    $result = mysqli_query($con, $sql);
    mysqli_close($con);

    if($result)
        echo "수정완료";
    else
        echo "수정오류";
        
    echo "
        <script>location.href='admin.php'</script>
    ";
?>