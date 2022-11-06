<?php
	require("db_connect.php");
	
	$name=$_POST['name'];
	
if($_POST['name'] != NULL){
	if($db->query("select count(*) from user where nickname='$name'")->fetchColumn() > 0){
		echo "존재하는 닉네임입니다.";
	} else {
		echo "존재하지 않는 닉네임입니다.";
	}
}else{
	echo "닉네임을 치시오";
}

 ?>