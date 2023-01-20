<?php
    session_start();

    $id = $_SESSION["userid"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $regist_day = date("Y-m-d (H:i)");

    $con = mysqli_connect("localhost","user","12345","sample");

    $sql = "update member set pass='$pass', name='$name', email='$email'";
    $sql .= " where id='$id'";


    $result = mysqli_query($con, $sql);
    mysqli_close($con);

    if($result)
        echo "수정완료";
    else
        echo "수정오류";
        
    echo "
        <script>location.href='index.php'</script>
    ";
?>