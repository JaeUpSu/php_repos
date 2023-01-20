<?php
    $id = $_POST["id"];
    $cat = $_POST["cat"];
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

    if(!$cat) {
        echo "
            <script>
                window.alert('카테고리를 입선택하세요');
                history.go(-1);
            </script>"
        ;
    }

    $regist_day = date("Y-m-d (H:i)");

    $con = mysqli_connect("localhost","user","12345","sample");

    $sql = "insert into blog2 (id, nick_name, cat, content, regist_day) ";
    $sql .= "values('$id', '$name', '$cat', '$content', '$regist_day')";

    // echo $sql;
    // exit;

    $result = mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
        <script>location.href='index.php'</script>
    ";
?>