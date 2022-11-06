<?php
	
	
			
	$original_title  = 	"";
	$title = 			"";
	$poster_path = 		"";
	$age  = 			"";
	$genre_id =			"";
	$release_date =		"";
	$director = 		"";
	$cast = 			"";
	$overview = 		"";
	$backdrop_path = 	"";
	$original_language ="";
	$popularity = 		"";
	$vote_average = 	"";
	$vote_count = 		"";
	$provider_id = 		"";
	$site_path = 		"";
	
	
	
	$action = "insert.php";
	
	$id = empty($_REQUEST["id"]) ? "" : $_REQUEST["id"];
	

	
	// $num = isset($_REQUEST["num"] ? $_REQuEST["num"] : "";
	if ($id) {						//글번호가 주어졌으면
		require("../db_connect.php");
		$query = $db->query("select * from tv where id=$id");
		
		if ($row = $query->fetch()) {	//변수 값 3개 변경 <--DB	
			$id  = 				$row["id"];
			$original_title  = 	$row["original_title"];
			$title = 			$row["title"];
			$poster_path = 		$row["poster_path"];
			$age  = 			$row["age"];
			$genre_id  = 		$row["genre_id"];
			$release_date  = 	$row["release_date"];
			$director = 		$row["director"];
			$cast = 			$row["cast"];
			$overview = 		$row["overview"];
			$backdrop_path = 	$row["backdrop_path"];
			
			$original_language = $row["original_language"];
			$popularity = 		$row["popularity"];
			$vote_average = 	$row["vote_average"];
			$vote_count = 		$row["vote_count"];
			$provider_id = 		$row["provider_id"];
			$site_path = 		$row["site_path"];
			
			$action = "update.php";
			
		}
	}
	



	
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        table { width:900px; }
        th    { width:150px; background-color:#3482EA; }
        input[type=text], textarea { width:100%; }
		input[type=checkbox] + label { 
		
		
		
		text-align:center;
		
		cursor: pointer;
		
		width: 100px;
		height:20px;
		}
		

    </style>
</head>
<body>



<h1>TV작품 추가</h1> 
<form method="post" action="<?=$action?>" enctype="multipart/form-data">
<div style="width:1000px; float:left;">
    <table>
    	<tr>
            <th>작품ID</th>
            <td><input type="text" name="id"  maxlength="80"
                       value="<?=$id?>">

            </td>
        </tr>
        
        
        <tr>
            <th>오리지널 제목</th>
            <td><input type="text" name="original_title"  maxlength="80"
                       value="<?=$original_title?>">

            </td>
        </tr>
        <tr>
            <th>제목</th>
            <td><input type="text" name="title"  maxlength="80"
                       value="<?=$title?>">

            </td>
        </tr>
        
		
		
        <tr>
            <th>포스터이미지</th>
            <td><input type="text" name="poster_path" maxlength="500"
                       value="<?=$poster_path?>">

            </td>
        </tr>
        
		
		
         
		      
        
         <tr>
            <th>장르</th>
		
			
			
			  


			 <td>
			 <input type="checkbox" name="genre[]" id="g1" value="12" <?= (strpos($genre_id,'12') !== false) ? "checked='checked'" : '' ?> ><label for= "g1"></label>모험
			 <input type="checkbox" name="genre[]" id="g2" value="14" <?= (strpos($genre_id,'14') !== false) ? "checked='checked'" : '' ?> ><label for= "g2"></label>판타지
			 <input type="checkbox" name="genre[]" id="g3" value="16" <?= (strpos($genre_id,'16') !== false) ? "checked='checked'" : '' ?> ><label for= "g3"></label>애니메이션
			 <input type="checkbox" name="genre[]" id="g4" value="18" <?= (strpos($genre_id,'18') !== false) ? "checked='checked'" : '' ?>><label for= "g4"></label>드라마
			 <input type="checkbox" name="genre[]" id="g5" value="27" <?= (strpos($genre_id,'27') !== false) ? "checked='checked'" : '' ?>><label for= "g5"></label>공포
			 <input type="checkbox" name="genre[]" id="g6" value="28" <?= (strpos($genre_id,'28') !== false) ? "checked='checked'" : '' ?>><label for= "g6"></label>액션
			 <input type="checkbox" name="genre[]" id="g7" value="35" <?= (strpos($genre_id,'35') !== false) ? "checked='checked'" : '' ?>><label for= "g7"></label>코미디
			 <input type="checkbox" name="genre[]" id="g8" value="36" <?= (strpos($genre_id,'36') !== false) ? "checked='checked'" : '' ?>><label for= "g8"></label>역사
			 <input type="checkbox" name="genre[]" id="g9" value="37" <?= (strpos($genre_id,'37') !== false) ? "checked='checked'" : '' ?>> <label for= "g9"></label>서부
			 
			 
			 <input type="checkbox" name="genre[]" id="g10" value="53"<?= (strpos($genre_id,'53') !== false) ? "checked='checked'" : '' ?>> <label for= "g10"></label>스릴러
			 <br>
			 
			 
			 <input type="checkbox" name="genre[]" id="g11" value="80"><?= (strpos($genre_id,'80') !== false) ? "checked='checked'" : '' ?> <label for= "g11"></label>범죄
			 <input type="checkbox" name="genre[]" id="g12" value="99"><?= (strpos($genre_id,'99') !== false) ? "checked='checked'" : '' ?> <label for= "g12"></label>다큐멘터리
			                                   
			 
			 
			 <input type="checkbox" name="genre[]" id="g13" value="878"  <?= (strpos($genre_id,'878') !== false) ? "checked='checked'" : '' ?>> <label for= "g13"></label>SF
			 <input type="checkbox" name="genre[]" id="g14" value="9648" <?= (strpos($genre_id,'9648') !== false) ? "checked='checked'" : '' ?>> <label for= "g14"></label>미스터리
			 <input type="checkbox" name="genre[]" id="g15" value="10402"<?= (strpos($genre_id,'10402') !== false) ? "checked='checked'" : '' ?>> <label for= "g15"></label>음악
			 <input type="checkbox" name="genre[]" id="g16" value="10749"<?= (strpos($genre_id,'10749') !== false) ? "checked='checked'" : '' ?>> <label for= "g16"></label>로맨스
			                                                                                         
			 <input type="checkbox" name="genre[]" id="g17" value="10751"<?= (strpos($genre_id,'10751') !== false) ? "checked='checked'" : '' ?>> <label for= "g17"></label>가족
			 <input type="checkbox" name="genre[]" id="g18" value="10752"<?= (strpos($genre_id,'10752') !== false) ? "checked='checked'" : '' ?>> <label for= "g18"></label>전쟁
			 <input type="checkbox" name="genre[]" id="g19" value="10759"<?= (strpos($genre_id,'10759') !== false) ? "checked='checked'" : '' ?>> <label for= "g19"></label>액션&어드밴쳐
			 <br>                                                                                                                               
			 <input type="checkbox" name="genre[]" id="g20" value="10762"<?= (strpos($genre_id,'10762') !== false) ? "checked='checked'" : '' ?>> <label for= "g20"></label>키즈
																																		  
			 <input type="checkbox" name="genre[]" id="g21" value="10763"<?= (strpos($genre_id,'10763') !== false) ? "checked='checked'" : '' ?>> <label for= "g21"></label>뉴스
			 <input type="checkbox" name="genre[]" id="g22" value="10764"<?= (strpos($genre_id,'10764') !== false) ? "checked='checked'" : '' ?>> <label for= "g22"></label>리얼리티
			 <input type="checkbox" name="genre[]" id="g23" value="10765"<?= (strpos($genre_id,'10765') !== false) ? "checked='checked'" : '' ?>> <label for= "g23"></label>공상과학&판타지
			 <input type="checkbox" name="genre[]" id="g24" value="10766"<?= (strpos($genre_id,'10766') !== false) ? "checked='checked'" : '' ?>> <label for= "g24"></label>연속극
																																		  
			 <input type="checkbox" name="genre[]" id="g25" value="10767"<?= (strpos($genre_id,'10767') !== false) ? "checked='checked'" : '' ?>> <label for= "g25"></label>토크
			 <input type="checkbox" name="genre[]" id="g26" value="10768"<?= (strpos($genre_id,'10768') !== false) ? "checked='checked'" : '' ?>> <label for= "g26"></label>시사
			 <input type="checkbox" name="genre[]" id="g27" value="10770"<?= (strpos($genre_id,'10770') !== false) ? "checked='checked'" : '' ?>> <label for= "g27"></label>TV영화
			 </td>
			 
			 
			 
			</tr>								   
			                                 
												   
											                                     
         <tr>                                      
            <th>개봉일</th>                        
            <td><input type="text" name="release_date" maxlength="20"
                       value="<?=$release_date?>">

            </td>
        </tr>
        
         <tr>
            <th>감독</th>
            <td><input type="text" name="director" maxlength="20"
                       value="<?=$director?>">

            </td>
        </tr>
        
         <tr>
            <th>배우</th>
            <td><input type="text" name="cast" maxlength="20"
                       value="<?=$cast?>">

            </td>
        </tr>
        
        
        <tr>
            <th>시놉시스</th>
            <td><textarea name="overview" rows="10"><?=$overview?></textarea>
            </td>
        </tr>
		
		<tr>
            <th>관람등급</th>
            <td>
			<input type="radio" name="age" value="전체 관람가" <?php if( $age== "전체 관람가" ) { echo "checked=true";}?>>전체 관람가
			<input type="radio" name="age" value="12세 관람가"<?php if( $age== "12세 관람가" ) { echo "checked=true";}?>>12세 관람가
			<input type="radio" name="age" value="15세 관람가"<?php if( $age== "15세 관람가" ) { echo "checked=true";}?>>15세 관람가
			<input type="radio" name="age" value="청소년 관람불가"<?php if( $age== "청소년 관람불가" ) { echo "checked=true";}?>>청소년 관람불가
            </td>
        </tr>
        
        <tr>
            <th>언어</th>
			
	
	
		<td>
			<select name="original_language">
				<option value="">언어 선택</option>
				 
				<option value="de" <?= ( $original_language== "de" ) ? "selected" : "" ?> >독일  </option>
				<option value="en" <?= ( $original_language== "en" ) ? "selected" : "" ?> >영어</option>
				<option value="es" <?= ( $original_language== "es" ) ? "selected" : "" ?>>스페인</option>
				<option value="ja" <?= ( $original_language== "ja" ) ? "selected" : "" ?>>일본</option>
				<option value="ko" <?= ( $original_language== "ko" ) ? "selected" : "" ?>>한국</option>
				<option value="nl" <?= ( $original_language== "nl" ) ? "selected" : "" ?>>네덜란드</option>
				<option value="pl" <?= ( $original_language== "pl" ) ? "selected" : "" ?>>폴란드</option>
				<option value="pt" <?= ( $original_language== "pt" ) ? "selected" : "" ?>>포르투갈</option>
				<option value="sk" <?= ( $original_language== "sk" ) ? "selected" : "" ?>>슬로바키아</option>
				<option value="th" <?= ( $original_language== "th" ) ? "selected" : "" ?>>태국</option>
				<option value="zh" <?= ( $original_language== "zh" ) ? "selected" : "" ?>>중국</option>
				<option value="tl" <?= ( $original_language== "tl" ) ? "selected" : "" ?>>기타</option>
			</select>
         </td>
        
        <tr>
            <th>인기</th>
            <td><input type="text" name="popularity" maxlength="20"
                       value="<?=$popularity?>">

            </td>
        </tr>
        
        
        <tr>
            <th>평점</th>
            <td><input type="text" name="vote_average" maxlength="20"
                       value="<?=$vote_average?>">

            </td>
        </tr>
        

        <tr>
            <th>카운트</th>
            <td><input type="text" name="vote_count" maxlength="20"
                       value="<?=$vote_count?>">

            </td>
        </tr>
        
       
		
		<tr>
            <th>OTT</th>
			 
			 <td>
			 <input type="checkbox" name="provider[]"  value="1" <?= (strpos($provider_id,'1') !== false) ? "checked='checked'" : '' ?>>웨이브
			 <input type="checkbox" name="provider[]" value="337" <?= (strpos($provider_id,'337') !== false) ? "checked='checked'" : '' ?>>디즈니플러스
			 <input type="checkbox" name="provider[]" value="8" <?= (strpos($provider_id,'8') !== false) ? "checked='checked'" : '' ?>>넷플릭스
			 <input type="checkbox" name="provider[]" value="97" <?= (strpos($provider_id,'97') !== false) ? "checked='checked'" : '' ?>>왓챠
			 
			 </td>
		</tr>
        
        
        
        <tr>
            <th>사이트 주소</th>
            <td><textarea name="site_path" rows="10"><?=$site_path?></textarea>
            </td>
        </tr>
        
        <tr>
            <th>백그라운드 이미지</th>
            <td><input type="text" name="backdrop_path" maxlength="500"
                       value="<?=$backdrop_path?>">

            </td>
        </tr>
		
	
    </table>
	
 <br>
    <input type="submit" value="저장">
    <input type="button" value="취소" onclick="history.back()">
</div>
</form>


<div style="float:left;">
작품ID : (작품 상세 페이지 접근 후 https://www.themoviedb.org/tv(movie)/다음으로 나오는 숫자가 작품번호)<br><br>
오리지널 제목, 제목: 영어,한글<br><br>
포스터이미지, 백그라운드:<br>
<a href="https://www.themoviedb.org/?language=ko" target='_blank' >https://www.themoviedb.org/?language=ko</a><br>
포스터클릭후 새탭에서 이미지 주소복사 붙여넣기<br><br>
개봉일: ex) 2022-06-21<br><br>
감독,배우: '/' 사용<br><br>
시놉시스: 1000글자<br><br>
인기:소수점가능<br>	<br>
평점:소수점가능<br><br>
카운트:소수점가능<br><br>
사이트주소:찾은OTT정보 주소<br><br>

</div>
</body>
</html>

