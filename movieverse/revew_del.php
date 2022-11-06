<?php
session_start();
require("db_connect.php");

$id = $_REQUEST["id"];
$tv_movie = $_REQUEST["choice"];
if($tv_movie=='tv'){
		$tv_movie='tv_id';
		}else{
		$tv_movie='movie_id';
		}

$db->query("delete from review where member_num='$_SESSION[userNum]' and $tv_movie=$id ");


echo "
    <script>
        alert(\"리뷰가 삭제되었습니다.\");
        history.back();
    </script>
";
?>