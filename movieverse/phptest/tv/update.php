<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>

<?php
	

	$id  = 				$_REQUEST["id"];
	$original_title  = 	$_REQUEST["original_title"];
	$title = 			$_REQUEST["title"];
	$poster_path = 		$_REQUEST["poster_path"];
	$age  = 			$_REQUEST["age"];
	
	$release_date  = 	$_REQUEST["release_date"];
	$director = 		$_REQUEST["director"];
	$cast = 			$_REQUEST["cast"];
	$overview = 		$_REQUEST["overview"];
	$backdrop_path = 	$_REQUEST["backdrop_path"];
	$original_language = $_REQUEST["original_language"];
	$popularity = 		$_REQUEST["popularity"];
	$vote_average = 	$_REQUEST["vote_average"];
	$vote_count = 		$_REQUEST["vote_count"];
	$site_path = 		$_REQUEST["site_path"];
	
	
	$genre= $_POST["genre"];
	$genre_id = implode(",",$genre);
	
	
	$provider = $_POST["provider"];
	$provider_id = implode("/",$provider);
	
	
	require("../db_connect.php");
	if ($id && $original_title && $title && $poster_path && $age && $genre_id && $release_date && $director && $cast && $overview  && $original_language && $popularity && $vote_average && $vote_count && $provider_id && $site_path && $backdrop_path) {
		
						
		$query = $db->exec("update tv set 
						id='$id', original_title='$original_title', title='$title', poster_path='$poster_path', age='$age', genre_id='$genre_id', release_date='$release_date', director='$director', cast='$cast', overview= '$overview', original_language='$original_language',
						popularity='$popularity', vote_average='$vote_average', vote_count='$vote_count', provider_id='$provider_id', site_path='$site_path', backdrop_path='$backdrop_path'
						where id =$id");
						
		header("Location:list.php");		//여기화면으로
		exit();								//exit 안할시 프로그램실행해서 에러발생시 문제발생
	}	
	
?>


<script>
	alert('모든 입력란에 값이 입력되어야 합니다.');
	history.back();
</script>

</body>
</html>