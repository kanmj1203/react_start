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
	<script src="js/data.js"></script>
	
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
  <a style="background-Color: #E5E5E5;"href="myinfo.php">내 계정정보</a>
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

  </div>
<script>
function popup(){
	
	var popupWidth = 500;
var popupHeight = 200;
var popupX = (window.screen.width / 2) - (popupWidth / 2);
var popupY= (window.screen.height /2.5) - (popupHeight / 2);
            var name = "회원 탈퇴 확인";
            var option = "width ="+popupWidth+", height = "+popupHeight+", top = "+popupY+", left = "+popupX+", location = no"
            window.open('about:blank', "popwin", option);
			document.f1.submit();

}
</script>


<div class="user_out_div">
<h2>회원탈퇴</h2>
<p id="texts">회원탈퇴 시 저장되어있는 작품목록이 사라지고, 작성한 평가내용도 사라집니다.<br>
회원탈퇴를 계속 진행하려면 비밀번호를 입력해주세요. </p>
<p class="pass" >비밀번호</p>
<form name="f1" action="user_out_ok.php" target="popwin" method="post">
 <input  class="pass_input" type="text"name="userpw" id="userpw"  placeholder="비밀번호" name="pass" size="35" required /> 
</form>
<td><div style="    margin:250px 0px 0px 210px;  position: absolute;"id="id_check">현재 비밀번호 확인</div></td>

 
 
 <script>
 var userpw;
 $(document).ready(function(e) { 
	$(".pass_input").on("keyup", function(){ //check라는 클래스에 입력을 감지
		var self = $(this); 
		
		if(self.attr("id") === "userpw"){ 
			userpw = self.val(); 
		} 
		$.post( //post방식으로 id_check.php에 입력한 userid값을 넘깁니다
			"pw_check_ajax.php",
			{ userpw : userpw }, 
			function(data){ 
				if(data){ //만약 data값이 전송되면
					self.parent().parent().find("#id_check").html(data); //div태그를 찾아 html방식으로 data를 뿌려줍니다.
					self.parent().parent().find("#id_check").css("color", "#F00"); //div 태그를 찾아 css효과로 빨간색을 설정합니다
				}
			}
		);
			
	});
		});
</script>
 
<button  onclick="popup()" type="button"class="user_out_btn">회원탈퇴</button>
<button style="margin-left: 0px;background:grey;" onclick="history.back()"class="user_out_btn">취소하기</button>
</div>
</body>
<?php
	  
	   }
?>

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


