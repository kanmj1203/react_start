<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>MovieVerse</title>
    <link rel="shortcut icon" href="./img/logo/logo_text_x.png">

    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/basic.css">

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
<script>
    function re_check_name() {
        $.ajax({
            url: "rechecke_name_ajax.php",
            type: "post",
            data: {
                name: $('#lo2').val(),
            }
        }).done(function(data) {
            $('#result2').text(data);
        });
    }
</script>
<script>
    function re_check_email() {
        $.ajax({
            url: "rechecke_mail_ajax.php",
            type: "post",
            data: {
                email: $('#lo1').val(),
            }
        }).done(function(data) {
            $('#result').text(data);
        });
    }
</script>
<script>
var new_pw,ps_ok;
$(document).ready(function(e) { 

$(".member_join_pw").on("keyup", function(){ //check라는 클래스에 입력을 감지
		var self = $(this); 
		
		if(self.attr("id") === "pw1"){ 
			new_pw = self.val(); 
		} 
		
		if(self.attr("id") === "pw2"){ 
			ps_ok = self.val(); 

		if(new_pw==ps_ok){
			ps_ok='ok';
		}else{
			ps_ok='no';
		}

		
			$.post( //post방식으로 id_check.php에 입력한 userid값을 넘깁니다
			"pw_check_ajax.php",
			{ ps_ok : ps_ok }, 
			function(data){ 
				if(data){ //만약 data값이 전송되면
					self.parent().parent().find("#pw_check").html(data); //div태그를 찾아 html방식으로 data를 뿌려줍니다.
					self.parent().parent().find("#pw_check").css("color", "#F00"); //div 태그를 찾아 css효과로 빨간색을 설정합니다
				}
			}
		);
}
	});


});
</script>
<body>
    <div class="all">
        <header>
            <div class="head">

                 <img class="logo" onclick="location.href='index.php?'" src="img/logo.png">
                <a class="home" onclick="location.href='index.php?bid='"> 홈 </a>
                <a class="dramatap" onclick="location.href='drama.php?bid=';"> 드라마/시리즈</a>
                <a class="movietap" onclick="location.href='movie.php?bid=';"> 영화</a>

                <form class="serch" action="search_result.php" method="get">
      <input id="searchInput"  type="text"  placeholder="드라마/시리즈, 영화 제목 검색해주세요" name="search" size="35" required="required" /> 
	  	    <input class="serch_Img" name="button" type="image" src="img/serch.png" />
    </form>
                <button class="login_btn" onclick="location.href='login.php';">로그인</button>
            </div>

        </header>
        <img class="logo_text" src="img/logo.png">
        <form method="post" action="member_join_in.php" name="memform">
            <div class="memberjoin_tle">
                <div class="memberjoin">

                    <p id="login_text1">회원가입</p>
                </div>
                <input style="margin-top: 146px; width: 263px;	" class="member_join_text" id="lo1" type="text" name="id" placeholder="아이디 입력">
                <div onclick="re_check_email()"style="cursor: pointer;" class="re_check">중복확인</div>
                <p id="result"></p>

                <input style="margin-top: 224px;" class="member_join_pw" type="password" id="pw1"name="pw" placeholder="비밀번호 입력">
                <input style="margin-top: 312px;" class="member_join_pw" type="password" id="pw2"name="pw" placeholder="비밀번호 확인">
               <p class="pwrepl"id="pw_check"style="">비밀번호 중복확인</p>
			   <input style="margin-top: 410px;width: 263px;" class="member_join_text" id="lo2" type="text" name="name" placeholder="닉네임">
               
			   <div onclick="re_check_name()" style="cursor: pointer;margin-top: 284px;" class="re_check">중복확인</div>
                <p style="top:497px" id="result2"></p>

                <input style="margin-top: 24px;" type="submit" class="memberjoin_btn" value="회원가입" />
            </div>
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


