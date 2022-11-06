<?php
	
	require("db_connect.php");  
	if($_REQUEST["id"]){
	$query=$db->query("select * from user where nickname='$_REQUEST[id]'");
	while ($row = $query->fetch()) {
	$iset=$row['email'];
	}
	if($iset){
		header("Location:id_pw_find_result.php?id=$iset");
		exit();
	}
	}else if($_REQUEST["pw"]){
		id();
	}
		header("Location:$_SERVER[HTTP_REFERER]");
		exit();
	
	
	function id(){
		require("db_connect.php");  
		$query=$db->query("select * from user where email='$_REQUEST[pw]'");
	while ($row = $query->fetch()) {
	$iset=$row['passwd'];
		header("Location:id_pw_find_result.php?pw=$iset");
		exit();
	
	}
	}
		
?>

