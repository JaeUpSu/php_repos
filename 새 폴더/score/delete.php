<?php

    $num = $_GET["num"];
   

    include "dbconn.php";

    $sql = "delete from score where num=$num";   
    
    $result = mysqli_query($conn, $sql);

    if ($result)
        echo "DB 레코드 삭제 완료!";
    else
        echo "DB 레코드 삭제 오류!";
    
    mysqli_close($conn);

    echo "
        <script>location.href='index-3.php'</script>
    ";
?>