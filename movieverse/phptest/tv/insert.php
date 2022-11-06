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
		
	
	if (!($id && $original_title && $title && $poster_path && $age && $genre_id && $release_date && $director && $cast && $overview  && $original_language && $popularity && $vote_average && $vote_count && $provider_id && $site_path && $backdrop_path)) { // 하나라도 빈칸 있으면	
?>

	<script>
		alert('모든 입력란에 값이 입력되어야 합니다.');
		history.back();
	</script>
<?php
	}else if($db->query("select count(*) from tv where id='$id'")->fetchColumn() > 0) {
?>		
			<script>
				alert('이미 등록된 번호입니다.');
				history.back();
			</script>	
		
<?php
	}else if($db->query("select count(*) from tv where original_title='$original_title'")->fetchColumn() > 0) {
?>		
		<script>
			alert('이미 등록된 오리지널 제목입니다.');
			history.back();
		</script>	
		
<?php
	}else if($db->query("select count(*) from tv where title='$title'")->fetchColumn() > 0) {
?>		
		<script>
			alert('이미 등록된 제목입니다.');
			history.back();
		</script>	
		
		
<?php
	} else {
		$query = $db->exec("insert into tv( 
							id, original_title, title, poster_path, age, genre_id, release_date, director, cast, overview, 
								original_language, popularity, vote_average, vote_count, provider_id, site_path, backdrop_path)
						values ('$id', '$original_title', '$title', '$poster_path', '$age', '$genre_id', '$release_date', '$director', '$cast', '$overview', '$original_language', '$popularity', '$vote_average', '$vote_count', '$provider_id', '$site_path' , '$backdrop_path')");
			
?>
<script>
			alert('추가 되었습니다.');

		</script>
<?php		
		header("Location:list.php");		//여기화면으로
		exit();								//exit 안할시 프로그램실행해서 에러발생시 문제발생
	}
?>



</body>
</html>