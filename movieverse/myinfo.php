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
                    <li onclick="location.href='myinfo.php';"><img class="userimg" src="img/user.png">내 계정정보</li>
                    <li onclick="location.href='pwre.php';"><img class="userimg" src="img/lock.png">비밀번호 수정</li>
                    <li onclick="location.href='mybook.php';"><img class="userimg" src="img/bookmark.png">내 북마크</li>
                    <li onclick="location.href='myreview.php';"><img class="userimg" src="img/review.png">작성한 평가</li>
                    <li onclick="location.href='log_out.php';"><img class="userimg" src="img/logout.png">로그아웃 </li>
            </div>

<body>

<div class="sidenav">
  <p id="side_TEXT">계정정보</p>
  <a style="background-Color: #E5E5E5;" href="myinfo.php">내 계정정보</a>
  <a href="pwre.php">비밀번호 수정</a>
  <a href="mybook.php">내 북마크</a>
  <a href="myreview.php">작성한 평가</a>
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
 <div class="text_div">
  <h1>비밀번호 수정</h1>
<p style="font-weight: 700;">비밀번호를 수정하여 재정보를 보호사시오</p><br>
<h1>내 북마크</h1>
<p  style="font-weight: 700;">북마크 기능을 통해 나만의 작품을 관리하시오</p><br>
<h1>작성한 평가</h1>
<p style="font-weight: 700;">나의 평가를 공유하세요</p><br>
<p style="cursor: pointer;"onclick="location.href='user_out.php';"><b>회원탈퇴 ></b><p>
</div>
  </div>

</body>
<?php
	  
	   }
?>


<footer class="footer">
<p class="footer_text">© https://movieverse.cafe24.com/html/index.php |  소개 : NETFLIX(넷플릭스) | Disnep+(디즈니플러스) | 왓챠플레이
Data & Content Image Based On Netflix.inc , Disnep.inc, Watcha.inc,JestWatch(c)

성남시 중원구 광명로 377(금광2동 2685) 신구대학교 남관212호
제안 또는 광고문의 : movieverse123@naver.com </p>
</footer>
</div>
  </body>
 
</html>


