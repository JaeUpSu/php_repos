<?php
    include "dbconn.php";

    $num = $_GET["num"];

    $sql = "delete from member where num=$num";


    $result = mysqli_query($conn, $sql);

    if ($result)
        echo "레코드 삭제 완료!";
    else
        echo "레코드 삭제 오류!";
    
    mysqli_close($conn);

    echo "
        <script>
            location.href='admin.php';
        </script>
    ";
?>