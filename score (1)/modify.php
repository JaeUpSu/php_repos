<?php
    include "dbconn.php";

    $num = $_GET["num"];
    $name = $_POST["name"];
    $sub1 = $_POST["sub1"];

    $sql = "update score set name='$name', sub1=$sub1 where num=$num";
    $result = mysqli_query($conn, $sql);
    
    mysqli_close($conn);

    echo "
        <script>
            location.href='index3.php';
        </script>
    ";
?>