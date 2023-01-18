<?php
    $num = $_POST["num"];
    $age = $_POST["age"];
    $mileage = $_POST["mileage"];
   
    include "dbconn.php";

    $sql = "update customer set ";
    $sql .= "age=$age, ";
    $sql .= "mileage=$mileage ";
    $sql .= " where num=$num";
    
    $result = mysqli_query($conn, $sql);

    if ($result)
        echo "DB 레코드 수정 완료!";
    else
        echo "DB 레코드 수정 오류!";
    
    mysqli_close($conn);

    echo "
        <script>location.href='index.php'</script>
    ";
?>