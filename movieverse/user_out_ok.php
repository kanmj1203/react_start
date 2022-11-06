<?php

session_start();
require("db_connect.php");
	$_POST['userpw']= empty($_POST['userpw']) ? NUll : $_POST['userpw'];	
if($_POST['userpw']!=$_SESSION["userPw"]){

echo "
    <script>
        alert(\"비밀번호가 다릅니다.\");
        location.href = 'history.back(),',window.close();
    </script>
";
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

  <div style="text-align: center">
  삭제 하시겠습니까?<br><br>
        <button onclick="opener.location.href='user_out_del.php'; window.close();">네</button>
        <button onclick="window.close()">아니요</button>
    </div>

</body>
</html>
