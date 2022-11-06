<?php
	$id=$_REQUEST["id"];
	$pw=$_REQUEST["pw"];
	
	require("db_connect.php");  
	$query=$db->query("select * from user where email='$id'and passwd='$pw'");
	if($row=$query->fetch()) {
		//로그인 처리
		session_start();
		$_SESSION["userId"	]	=	$row["email"];
		$_SESSION["userName"]	=	$row["nickname"];
		$_SESSION["userPw"]	=		$row["passwd"];
		$_SESSION["userNum"]	=		$row["member_num"];
		//login_main.php로 이동
		header("Location:index.php");
		exit();
	}else{
	header("Location:login.php?nonid=no");
	exit();
		}
?>

