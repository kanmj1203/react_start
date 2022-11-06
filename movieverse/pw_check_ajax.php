<?php
	require("db_connect.php");
		session_start();
		
	$_POST['userpw']= empty($_POST['userpw']) ? NUll : $_POST['userpw'];	
	if($_POST['userpw'] != NULL){

	if($_POST['userpw']===$_SESSION["userPw"]){
		echo "현재 비밀번호가 맞습니다.";
		return;
	} else {
		echo "현재 비밀번호가 아닙니다.";
		return;
	}
	}
	
	if($_POST['ps_ok']=='ok'){
		
		echo "새로운 비밀번호가 일치합니다.";
		return;
	} else {
		echo "새로운 비밀번호가 일치하지 않습니다.";
		return;
	}
	
 ?>