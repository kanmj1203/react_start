<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <style>
		html, body {
			width:100%;
			padding-top: 35px;
			height:100%;
		}
        table     { width:1000px; text-align:center; text-align:20px; font-size: 20px;}
        th        { background-color:#3482EA; }
        
        .id      { width: 80px; }
        .original_title    	{ width:400px; }
        .titla   { width:400px; }
        
        .release_date  { width:120px; }
                
        a:link    { text-decoration:none; color:black; }
        a:visited { text-decoration:none; color:black; }
        a:hover   { text-decoration:none; color:red;  }
        
        .logo {
		    cursor: pointer;
		    position: absolute;
		    width: 212px;
		    height: 40px;
		    left: 10px;
		    top: 30px;
		}
        
        .all {
		    width: 100%;
		    height: 100%;
		    margin: 0 auto;
		}
        
        
        .head {
		    position: fixed;
		    width: 1920px;
		    height: 100px;
		    left: 0px;
		    top: 0px;
		    background: #FFFFFF;
		    border: 1px solid #3482EA;
		    box-sizing: border-box;
		}
		
		.sidenav {
		    height: 100vh;
		    width: 300px;
		    position: fixed;
		    margin-left: -10px;
		    background-color: white;
		    overflow-x: hidden;
		    padding-top: 20px;
			padding-left: 20px;
			font-size:20px;
			color:#ffffff;
			background-color:#3482EA;
		    float: left;
		    border: 1px solid #bcbcbc;
		}
		
	.rect3{
	  top: 10px;
	  left: 1350px;
	  position: relative;
	}
		
    </style>
</head>


<body>
<div class="all">
 <div class="head">

	<a href="/html/index.php"><img class="logo"src="../img/logo.png"></a>			<!-- 링크걸기 -->
</div>


<div class="sidenav">
  <a href="list.php">관리자 페이지</p>
  <a href="user/list.php">회원 정보</a>
  <br><br>
  <a href="movie/list.php">영화 정보</a>
  <br><br>
  <a href="tv/list.php">TV 정보</a>
 
</div>


<h1 style="text-align: center;"> 관리자 페이지 </h1>
<h2 style="text-align: center;"> 관리자 페이지 </h2><br><br><br>

<h2 style="text-align: center;"> 작품 검색<br><a href="https://www.themoviedb.org/?language=ko" target='_blank'>https://www.themoviedb.org/?language=ko</a></h2><br><br>

<h2 style="text-align: center;">디즈니플러스<br><a href="https://www.disneyplus.com/ko-kr" target='_blank'>https://www.disneyplus.com/ko-kr</a></h2><br><br>

<h2 style="text-align: center;">왓챠<br><a href="https://watcha.com/" target='_blank'>https://watcha.com/</a></h2><br><br>

<h2 style="text-align: center;">넷플릭스<br><a href="https://www.netflix.com/kr/" target='_blank'>https://www.netflix.com/kr/</a></h2><br><br>

<h2 style="text-align: center;">웨이브<br><a href="https://www.wavve.com/" target='_blank'>https://www.wavve.com/</a></h2><br><br>




<!-- <?php
	// DB 접속
	$db = new PDO("mysql:host=localhost;port=3307;dbname=phpdb", "php", "1234");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
       -->
</table>

</div>


</body>
</html>