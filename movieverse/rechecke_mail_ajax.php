<?php
	require("db_connect.php");
	
	$email=$_POST['email'];
	
if($_POST['email'] != NULL){
	if($db->query("select count(*) from user where email='$email'")->fetchColumn() > 0){
		echo "존재하는 아이디입니다.";
	} else {
		echo "존재하지 않는 아이디입니다.";
	}
}else{
	echo "아이디를 치시오";
}

 ?>