<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MovieVerse</title>
    <link rel="shortcut icon" href="./img/logo/logo_text_x.png">
	
	<link rel="stylesheet" type="text/css"href="css/user.css">
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
        $("#searchInput").autocomplete({
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

 <img class="logo" src="img/logo.png" onclick="location.href='index.php?bid='">
     <a class="home" onclick="location.href='index.php?bid='"> 홈 </a>
       <a class="dramatap" onclick="location.href='drama.php?bid=';"> 드라마/시리즈</a>
       <a class="movietap" onclick="location.href='movie.php?bid=';"> 영화</a>
	
 <form class="serch" action="search_result.php" method="get">
      <input id="searchInput"  type="text"  placeholder="드라마/시리즈, 영화 제목 검색해주세요" name="search" size="35" required="required" /> 
	  	   <input class="serch_Img" name="button" type="image" src="img/serch.png" />
    </form>
		

<?php 
	require("db_connect.php");


	$query3 = $db->query("select *  from user where email='$_SESSION[userId]' "); 
	while ($row = $query3->fetch()) {
		if($row['img_link']){
		$iset=$row['img_link'];
	}else{
			$iset="user_img";
		}
	
	
	
?>

                <script>
                    function Display() {
                        var asd = document.getElementById("userDiv");
                        if (asd.style.display == 'none') {
                            asd.style.display = 'block';
                        } else {
                            asd.style.display = 'none';
                        }

                    }
                </script>
                <img class="user_img" onclick="javascript:Display();" src="user_img/<?=$iset;?>">
				

</div>	
  <div  style="display: none;margin-top:-1px;" id="userDiv">
                <h3><img class="userimg_2" src="user_img/<?=$iset;?>"><?=$_SESSION["userName"]?></h3>
                <ul>
                    <li style="background: #E5E5E5;" onclick="location.href='myinfo.php';"><img class="userimg" src="img/user.png">내 계정정보</li>
                    <li onclick="location.href='pwre.php';"><img class="userimg" src="img/lock.png">비밀번호 수정</li>
                    <li onclick="location.href='mybook.php';"><img class="userimg" src="img/bookmark.png">내 북마크</li>
                    <li onclick="location.href='myreview.php';"><img class="userimg" src="img/review.png">작성한 평가</li>
                    <li onclick="location.href='log_out.php';"><img class="userimg" src="img/logout.png">로그아웃 </li>
            </div>

<body>

<div style="height: 2522px;" class="sidenav">
  <p id="side_TEXT">계정정보</p>
  <a href="myinfo.php">내 계정정보</a>
  <a href="pwre.php">비밀번호 수정</a>
  <a href="mybook.php">내 북마크</a>
  <a style="background-Color: #E5E5E5;" href="myreview.php">작성한 평가</a>
</div>

<div class="main">

   <div class="main_Img">
     <div class="user_Img"><img style="width:100%;"src="user_img/<?= $iset?>"></div>
	 <p class="name"><?=$row['nickname']?></p>
	 
 <script>
$(document).ready(function(){
  var fileTarget = $('.filebox .upload-hidden');

    fileTarget.on('change', function(){
        if(window.FileReader){
            var filename = $(this)[0].files[0].name;
        } else {
            var filename = $(this).val().split('/').pop().split('\\').pop();
        }

        $(this).siblings('.upload-name').val(filename);
    });
}); 

  </script>	 
	 
	 <form name='tmp_name' method="post" action="img_plus.php" enctype="multipart/form-data">
	 
	 <div class="filebox">
    <label for="file"></label> 
	    <input type="file"  name="imgFile" id="file"class="upload-hidden">
    <input class="upload-name" value="" placeholder="첨부파일" >
	</div> 

   <button class="submit" type="submit">저장</button>
	 </form>
     <p class="id_main"><?=$row['email']?></p>



 </div>

<h2 style="margin-top:40px;margin-left:24px;">작성한 평가 </h2>
 <?php
	}
	
		$numLines= 5;
	$numLinke= 3;

	$page = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];
	$stat = ($page -1) * $numLines;
	
	
	  $query3 = $db->query("
(select *,DATE(review_date)as review_date FROM review,tv WHERE review.member_num='$_SESSION[userNum]' AND tv.id=review.tv_id)
UNION ALL
(select *,DATE(review_date)as review_date FROM review,movie WHERE review.member_num='$_SESSION[userNum]' AND movie.id=review.movie_id)LIMIT $stat , $numLines; 
 "); 

	while ($row = $query3->fetch()) {

if($row['id']!=null){
$choice="tv";
}else{
$choice="movie";
}
	   	$content = str_replace(" ", "&nbsp;", $row['review']);
			$row['review'] = str_replace("\n", "<br>", $content);
			
			
			
	$ress=$db->query("select count(*) from good where id=$row[id] and good_yes=$row[member_num] and member_num= $_SESSION[userNum]")->fetchColumn();
			
			if($ress>0){
$good_img="goodyes.png";
}else{
$good_img="good.png";
}
?>
<hr class="line" width =80% color="#707070" align="left" size=1px/>
<div>
 <span class="star">
            ★★★★★
            <span style="width:<?=$row['star_rating']*10?>%;" id="box">★★★★★</span>
            <input id="star_value" type="range" oninput="drawStar(this)" value="" step="1" min="0" max="10">
        </span>
<div  class="other_review">

<img class="review_user_img" src="https://image.tmdb.org/t/p/original<?=$row['poster_path']?>">
             <div class="review"><?=$row['review']?></div>
<p class="date"><?=$row['review_date']?></p>
   <img  style="width: 20px;margin: -21px 0 0 502px;cursor: pointer;position: absolute;"onclick="location.href='good.php?choice=<?=$choice?>&id=<?=$row['id']?>&member_num=<?=$row['member_num']?>'"src="img/<?=$good_img?>">
   <div style="color: #707070;margin: -22px 0 0 530px;position: absolute; "class=""><?=$row['good']?></div>
				
</div>
<button class="rebutton"onclick="location.href='choice.php?choice=<?=$choice?>&id=<?=$row['id']?>&re=re';">수정하기</button>
<button onclick="location.href='revew_del.php?choice=<?=$choice?>&id=<?=$row['id']?>'" class="delbutton">삭제하기</button>

</div>
 <?php
	}
?>
</body>
        <?php
	$firstLink = floor(($page - 1)/$numLinke)*$numLinke+1;
	$lastLink = $firstLink + $numLinke -1;

	$numRecords = $db->query("select count(*) from  review  where member_num='$_SESSION[userNum]'")->fetchColumn();
	$numPage = ceil($numRecords / $numLines);

	if($lastLink  >$numPage){
	   $lastLink = $numPage;
	}//올림은 ceil

?>
        <div class="page_num">
            <?php
		if($firstLink>1){
?>
            <a class="nones" href="myreview.php?page=<?= $firstLink -1 ?>"> 이전 </a>
            <?php
	 }

		for ($i=$firstLink; $i <= $lastLink; $i++){
?>
            <a class="nones" href="myreview.php?page=<?=$i?>"> <?=($i == $page) ? "<u>$i</u>" : $i?> </a>
            <?php
		}

		if($lastLink<$numPage){
?>
            <a class="nones" style='margin:0;' href="myreview.php?page=<?=$lastLink +1?>"> 다음 </a>
            <?php
		}

?>

        </div>
</div>
<footer style="margin-top:2322px;" class="footer">
<p class="footer_text">© 2020 TVNNG.COM | 요금제 및 소개 : NETFLIX(넷플릭스) | wavve(웨이브) | 티빙 | 왓챠플레이
Data & Content Image Based On Netflix.inc , 콘텐츠웨이브(주), Amazon.inc, Watcha.inc, CJ ENM, TiVo Platform Technologies, JestWatch(c)
Icons made by fonticons.inc | Hosting by Gabia.inc
<br><br>
제안 또는 광고문의 : dbswl5@kakao.com</p>
</footer>

  </body>
 
</html>


