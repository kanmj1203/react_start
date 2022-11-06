<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MovieVerse</title>
    <link rel="shortcut icon" href="./img/logo/logo_text_x.png">
	
	<link rel="stylesheet" type="text/css"href="css/user.css">
	<link rel="stylesheet" type="text/css"href="css/basic.css">
	<link rel="stylesheet" type="text/css"href="js/list.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="js/data.js"></script>
	
  </head>
  
  <script>
	
	$(function () {	
		$("#searchInput").autocomplete({  
			source: List,
			focus : function(event, ui) { 	
				return false;
			},
			minLength: 1,
			delay: 100,	
			

		});
	});

</script>

  
 <body>
 <div class="all">
  <header>
  <div class="head">

<img class="logo"src="img/logo.png">
     <a class="home" onclick="location.href='index.php?bid='"> 홈 </a>
       <a class="dramatap" onclick="location.href='drama.php?bid=';"> 드라마/시리즈</a>
       <a class="movietap" onclick="location.href='movie.php?bid=';"> 영화</a>
	
 <form class="serch" action="search_result.php" method="get">
      <input id="searchInput"  type="text"  placeholder="드라마/시리즈, 영화 제목 검색해주세요" name="search" size="35" required="required" /> 
    </form>
		
	   <img class="serch_Img"src="img/serch.png">
<?php 
$a=1;
if($a==1){
?>
	   <button class="login_btn" onclick="location.href='login.php';">로그인</button>
<?php
	   }else if($a==1){
?>
<button class="login_btn" onclick="location.href='login.php';">로그인</button>
<?php
	   }else{
?>	
<button class="login_btn" onclick="location.href='login.php';">로그인</button>
<?php	   
	   }
?>
</div>	
<body>

<div class="sidenav">
  <p id="side_TEXT">계정정보</p>
  <a href="myinfo">내 계정정보</a>
  <a href="pwre">비밀번호 수정</a>
  <a href="mybook">내 북마크</a>
  <a href="myreview">작성한 평가</a>
</div>

<div class="main">

   <div class="main_Img">
     <div class="user_Img"></div>
     <p>사용자 이메일</p>
     <p>사용자 닉네임</p>
 </div>
 <div class="divpwre">
  <h1>비밀번호 수정</h1>
       <p>현재 비밀번호</p>
<input style="" id="id" type="password" name="pw" placeholder="현재 비밀번호">
<p>새로운 비밀번호</p>
<input style="" id="id" type="password" name="pw" placeholder="새로운 비밀번호">
<p>비밀번호 확인</p>
<input style="" id="id" type="password" name="pw" placeholder="비밀번호 확인">
<button class="login_btn" onclick="javascript:history.back()">정보수정</button>
<button class="login_btn" onclick="location.href='login.php';">취소하기</button>
  </div>
  </div>
</body>


  </header>

<div style="margin: 1600px 0px 0px;"><a href=".serch">제일 위로</a></div></div>
<footer class="footer">
<p class="footer_text">© 2020 TVNNG.COM | 요금제 및 소개 : NETFLIX(넷플릭스) | wavve(웨이브) | 티빙 | 왓챠플레이
Data & Content Image Based On Netflix.inc , 콘텐츠웨이브(주), Amazon.inc, Watcha.inc, CJ ENM, TiVo Platform Technologies, JestWatch(c)
Icons made by fonticons.inc | Hosting by Gabia.inc
<br><br>
제안 또는 광고문의 : dbswl5@kakao.com</p>
</footer>

  </body>
 
</html>


