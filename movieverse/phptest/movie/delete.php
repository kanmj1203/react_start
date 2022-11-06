<?php
	$id = $_REQUEST["id"];
		
	
	require("../db_connect.php");
	
	$query = $db->exec("delete from movie where id=$id");
						
	header("Location:list.php");		
	exit();							
?>

