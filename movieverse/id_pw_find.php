<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MovieVerse</title>
	
	<link rel="stylesheet" type="text/css"href="css/login.css">
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
        <header>
            <div class="head">

                <img class="logo" onclick="location.href='index.php?bid='" src="img/logo.png">
                <a class="home" onclick="location.href='index.php?bid='"> 홈 </a>
                <a class="dramatap" onclick="location.href='drama.php?bid=';"> 드라마/시리즈</a>
                <a style="color: #3482EA;" class="movietap" onclick="location.href='movie.php?bid=';"> 영화</a>

                <form class="serch" action="search_result.php" method="get">
                    <input id="searchInput" type="text" placeholder="드라마/시리즈, 영화 제목 검색해주세요" name="search" size="35" required="required" />
                     <input class="serch_Img" name="button" type="image" src="img/serch.png" />
                </form>
           <button class="login_btn" onclick="location.href='login.php';">로그인</button>
        </header>
<img class="logo_text"src="img/logo.png">

<form class="login" action="idpw_find.php" method="post">

	<p id="login_text1">로그인</p>
		<p id="login_text2">MovieVerse 계정 로그인</p>

		<input id="id"type="text" name="id" placeholder="닉네임을 입력하시오">

	<input type="image" name="submit"  class="next"src="img/next.png" border="0">
		<p style="cursor:pointer;"class="find"onclick="location.href='id_pw_find.php';">아이디/ <a style="color: white;"href="pw_find.php">비밀번호 찾기</a></p>

	<p style="top: 476px;cursor:pointer;" class="find"onclick="location.href='member_join.php?bid=';">계정이 없으신가요?가입</p>
	<p class="other">----------------------------------------------------------------------------</p>

</form>


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


