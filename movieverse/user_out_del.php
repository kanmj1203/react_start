<?php

session_start();
require("db_connect.php");
$num = $_SESSION["userNum"];

unset($_SESSION["userId"]);
unset($_SESSION["userName"]);
unset($_SESSION["userPw"]);
unset($_SESSION["userNum"]);

$db->exec("delete from user where  member_num='$num'");
$db->exec("delete from review where member_num='$num'");



echo "
    <script>
        alert(\"정상처리 되었습니다.\");
        location.href = 'index.php';
    </script>
";
?>