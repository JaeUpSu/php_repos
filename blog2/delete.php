<?php
    $con = mysqli_connect("localhost","user","12345","sample");
    

    $num = $_GET["num"];

    $sql = "delete from blog2 where num=$num";


    $result = mysqli_query($con, $sql);

    if ($result)
        echo "레코드 삭제 완료!";
    else
        echo "레코드 삭제 오류!";
    
    mysqli_close($con);

    echo "
        <script>
            location.href='index.php';
        </script>
    ";
?>