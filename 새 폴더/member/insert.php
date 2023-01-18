<?php
    $id = $_POST["id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $regist_day = date("Y-m-d (H:i)");

    $con = mysqli_connect("localhost","user","12345","sample");

    $sql = "insert into member (id, pass, name, email, regist_day, level, point) ";
    $sql .= "values('$id', '$pass', '$name', '$email', '$regist_day', 9, 0)";

    $result = mysqli_query($con, $sql);
    mysqli_close($con);

    if($result)
        echo "삽입완료";
    else
        echo "삽입오류";
        
    echo "
        <script>location.href='index.php'</script>
    ";
?>