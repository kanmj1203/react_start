<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MovieVerse</title>
	<link rel="shortcut icon" href="./img/logo/logo_text_x.png">
	
	<link rel="stylesheet" type="text/css"href="css/serch.css">
	<link rel="stylesheet" type="text/css"href="css/main.css">
	<link rel="stylesheet" type="text/css"href="css/basic.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


  </head>
  
<script>
List = [];
</script>

<div>
<?php 
	require("db_connect.php");
	session_start();
	$_SESSION["userId"] = empty($_SESSION["userId"]) ? "" : $_SESSION["userId"];
	
$query3 = $db->query("SELECT title FROM tv UNION SELECT title  FROM movie "); 
	while ($row = $query3->fetch()) {
	
	
	

?>
<script>
List.push('<?=$row['title'];?>');
</script>
<?php
}
?>

</div>
<script>

    $(function() {
        $(".searchInput").autocomplete({
            source: List,
            focus: function(event, ui) {
                return false;
            },
            minLength: 1,
            delay: 100,


        });
    });
</script>
           
 <body>
 <div class="all">

  <div class="head">

<img class="logo"onclick="location.href='index.php?bid='" src="img/logo.png">
     <a class="home" onclick="location.href='index.php?bid='"> 홈 </a>
       <a class="dramatap" onclick="location.href='drama.php?bid=';"> 드라마/시리즈</a>
       <a class="movietap" onclick="location.href='movie.php?bid=';"> 영화</a>
	

		
	   
	  <?php 

	$_SESSION["userId"] = empty($_SESSION["userId"]) ? "" : $_SESSION["userId"];
	

$a=1;
if(	$_SESSION["userId"]!=""){

	$query3 = $db->query("select *  from user where email='$_SESSION[userId]' "); 
	while ($row = $query3->fetch()) {
	$iset=$row['img_link'];
	}
	
	
?>
<script>
function Display(){
	var asd = document.getElementById("userDiv");
	if(asd.style.display=='none'){
		asd.style.display = 'block';
	}else{
		asd.style.display = 'none';
	}
  
}
</script>
<img class="user_img"onclick="javascript:Display();"src="user_img/<?= $iset?>">
<?php
	   }else{
?>	
<button class="login_btn" onclick="location.href='login.php';">로그인</button>
<?php	   
	   }
?>
</div>	
<?php 
if(	$_SESSION["userId"]!=""){
	
	?>
            <div style="display: none;" id="userDiv">
                <h3><img style="height: 40px;width:40px;" class="userimg" src="user_img/<?= $iset?>"><?=$_SESSION["userName"]?></h3>
                <ul>
                    <li onclick="location.href='myinfo.php';"><img class="userimg" src="img/user.png">내 계정정보</li>
                    <li onclick="location.href='pwre.php';"><img class="userimg" src="img/lock.png">비밀번호 수정</li>
                    <li onclick="location.href='mybook.php';"><img class="userimg" src="img/bookmark.png">내 북마크</li>
                    <li onclick="location.href='myreview.php';"><img class="userimg" src="img/review.png">작성한 평가</li>
                    <li onclick="location.href='log_out.php';"><img class="userimg" src="img/logout.png">로그아웃 </li>
            </div>
<?php
}
?>


 <form class="mainserch" action="search_result.php" method="get">

      <input class="searchInput"  type="text"  placeholder="드라마/시리즈, 영화 제목 검색해주세요" name="search" size="35" required="required" /> 
   <input class="serch_Img" name="button" type="image" src="img/serch.png" />
  </form>	     
	 <script>
    function move(type, check) {

	if (check=='up'){
		var check='.movies';
	}else if(check=='down'){
		var check=check='.movies2';
		}
	 var tab = document.querySelector(check)
      var marginLeft = window.getComputedStyle(tab).getPropertyValue('margin-left');
	  marginLeft=parseInt(marginLeft);
	  console.log(marginLeft);
	if(type === 'right' && marginLeft !=-612  ) {
	  var a= marginLeft-204;	
      document.querySelector(check).style.marginLeft = a+'px' ;
	  document.querySelector(check).style.transition = `${0.1}s ease-out`;

	}else if(type === 'left'&&marginLeft!=0 ){
		 var a= marginLeft+204;
		 document.querySelector(check).style.marginLeft = a+'px' ;
		 document.querySelector(check).style.transition = `${0.1}s ease-out`;
	}		  

	
}
</script>

<div style="position: relative;">
<?php require("db_connect.php");
$search =isset($_REQUEST["search"]) ? $_REQUEST["search"] : "";
$cou=$db->query("SELECT count(*) as cnt from movie 	where title LIKE '%$search%' ")->fetchColumn();
$cou2=$db->QUERY("SELECT count(*) as cnt FROM tv 	where title LIKE '%$search%' ")->fetchColumn();
	$search = $_GET['search'];
	?>

<div class="serch_tes">
<h2 class="serch_movie">영화 검색 결과 : <?=$cou?>개</h2>
<div onclick="location.href='movie.php?search=<?=$search?>'"class="movie_plus" style="float:right;">더보기 ></div>
</div>
<img onclick='move("left","up")' class="left"src="img/left.png">
<img onclick='move("right","up")'class="right"src="img/right.png">
<div class="show" >	
	<div class="movies" >	

<?php
	$pxs=0;
	
	$query3 = $db->query("SELECT *,count(*) as cnt,   GROUP_CONCAT(genres.genres_name) AS genrs_names  from movie left join genres ON movie .genre_id LIKE  CONCAT('%',genres.genre_id,'%') 
	where title like '%$search%'   group by movie.id  order by release_date desc");
	
	
	while ($row = $query3->fetch()) {

	?>

<div class="banner_img" style="margin-left:<?=$pxs?>px;"onclick="location.href='choice.php?choice=movie&id=<?=$row['id'];?>';" >
<img style="height: 270px;"src="https://image.tmdb.org/t/p/w220_and_h330_face<?=$row['poster_path'];?>">
   <p style="top:0px;"  class="hover_text"><?=$row['title']?></p>
   <p style="top:80px;" class="hover_text"><?=$row['release_date']?></p>
   <p style="top:130px;" class="hover_text"><?=$row['age']?></p>
   <p style="top:180px;" class="hover_text"><?=$row['genrs_names']?></p>
  
  
</div>

<?php
$pxs=24;
	}
?>
	</div>
</div>

<img style="top:400px" onclick='move("left","down")' class="left"src="img/left.png">
<img style="top:400px" onclick='move("right","down")' class="right"src="img/right.png">

<div style="margin-top:310px" class="serch_tes">
<h2 class="serch_movie">tv 검색 결과 : <?=$cou2;?>개</h2>

<div onclick="location.href='drama.php?search=<?=$_GET['search']?>'"  class="movie_plus" style="float:right;">더보기 ></div>
</div>
<div style="top:400px"class="show" >	
	<div class="movies2" >	

<?php
	$pxs=0;

	
	$query3 = $db->query("SELECT *  , GROUP_CONCAT(genres.genres_name) AS genrs_names  from tv left join genres ON tv.genre_id LIKE  CONCAT('%',genres.genre_id,'%') 
	where title like '%$search%'   group by tv.id  order by release_date desc ");
	while ($row = $query3->fetch()) {

	?>

<div class="banner_img" style=" margin-left:<?=$pxs?>px;"onclick="location.href='choice.php?choice=tv&id=<?=$row['id'];?>';" >
<img style="height: 270px;"src="https://image.tmdb.org/t/p/w220_and_h330_face<?=$row['poster_path'];?>">
   <p style="top:0px;"  class="hover_text"><?=$row['title']?></p>
   <p style="top:80px;" class="hover_text"><?=$row['release_date']?></p>
   <p style="top:130px;" class="hover_text"><?=$row['age']?></p>
   <p style="top:180px;" class="hover_text"><?=$row['genrs_names']?></p>
  
</div>

<?php
$pxs=24;
}
?>
	</div>
</div>
</div>
<div style="margin: 400px 0px 0px;"></div>

<footer class="footer">
<p class="footer_text">© 2020 TVNNG.COM | 요금제 및 소개 : NETFLIX(넷플릭스) | wavve(웨이브) | 티빙 | 왓챠플레이
Data & Content Image Based On Netflix.inc , 콘텐츠웨이브(주), Amazon.inc, Watcha.inc, CJ ENM, TiVo Platform Technologies, JestWatch(c)
Icons made by fonticons.inc | Hosting by Gabia.inc
<br><br>
제안 또는 광고문의 : dbswl5@kakao.com</p>
</footer>
</div>
  </body>
 
</html>


