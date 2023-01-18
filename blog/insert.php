<?php
    $id = $_POST["id"];
    $name = $_POST["name"];
    $content = $_POST["content"];

    if(!$content) {
        echo "
            <script>
                window.alert('내용을 입력하세요');
                history.go(-1);
            </script>"
        ;
    }

    $regist_day = date("Y-m-d (H:i)");

    $con = mysqli_connect("localhost","user","12345","sample");

    $sql = "insert into blog (id, nick_name, content, regist_day) ";
    $sql .= "values('$id', '$name', '$content', '$regist_day')";

    // echo $sql;
    // exit;

    $result = mysqli_query($con, $sql);
    mysqli_close($con);

    if($result)
        echo "삽입완료";
    else
        echo "삽입오류";
        
    echo "
        <script>location.href='_index.php'</script>
    ";
?>