<?php
	$member_num = $_REQUEST["member_num"];
		
	
	require("../db_connect.php");
	
	$query = $db->exec("delete from user where member_num=$member_num");

	header("Location:list.php");		
	exit();							
?>

