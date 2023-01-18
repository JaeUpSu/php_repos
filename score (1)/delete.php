<?php
    include "dbconn.php";

    $num = $_GET["num"];



    $sql = "delete from score where num=$num";


   // echo $sql;
   // exit;




    $result = mysqli_query($conn, $sql);

    if ($result)
        echo "레코드 삭제 완료!";
    else
        echo "레코드 삭제 오류!";
    
    mysqli_close($conn);

    echo "
        <script>
            location.href='index-2.php';
        </script>
    ";
?>