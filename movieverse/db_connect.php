<?php

	// DB 연결
	// $db = new PDO("mysql:host=localhost;dbname=데이터베이스명", "아이디", "비밀번호");	
	// https://movieverse.cafe24.com/html/index.php
	//$db = new PDO("mysql:host=localhost;port=3306;dbname=movieverse", "movieverse", "ww970714**");
	$db = new PDO("mysql:host=localhost;port=3307;dbname=movieverse", "movieverse", "1234");
	
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 


?>

