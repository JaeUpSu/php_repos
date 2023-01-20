<?php
  $id = $_POST["id"];
  $pass = $_POST["pass"]; // 사용자가 입력한 비밀번호

  $con = mysqli_connect("localhost", "user", "12345", "sample");
  $sql = "select * from member where id ='$id'";
  $result = mysqli_query($con, $sql); // id에 대한 record 정보

  $num_match = mysqli_num_rows($result); // 개수 count
  
  if(!$num_match) {
    echo "<script>
          window.alert('등록되지 않은 아이디입니다!')
          history.go(-1) 
          </script>";
          // history.go(-1) : 이전페이지로 돌아가기
  } else {
    $row = mysqli_fetch_assoc($result); // 실제 record 하나씩 가져오는 것
    $db_pass = $row["pass"];

    mysqli_close($con);

    if($pass != $db_pass) { // 사용자가 입력한 비밀번호 != DB에 저장된 비밀번호
      echo "<script>
            window.alert('비밀번호가 틀립니다!')
            history.go(-1)
            </script>";
      exit;
    } else { // DB에 계속 접속하지 않아도 session 이용해서 처리가능
          session_start();
          $_SESSION["userid"] = $row["id"];
          // $row["id"]를 $_SESSION["userid"]에 setting 이게 로그인 아이디가 됨.
          // 모든 페이지 앞에서 userid 체크해서 이게 있으면 로그인상태
          echo "<script>
                  location.href = '../index.php'; 
                </script>";
    }  // ../ logout 후 상위 폴더 blog2/index.php로 가기 위함 
  }
?>

