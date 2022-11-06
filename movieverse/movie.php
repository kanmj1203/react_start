<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>MovieVerse</title>
    <link rel="shortcut icon" href="./img/logo/logo_text_x.png">

    <link rel="stylesheet" type="text/css" href="css/basic.css">
    <link rel="stylesheet" type="text/css" href="css/movie.css">
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
    // $_SESSION["userNum"] = empty($_REQUEST["userNum"]) ? "" : $_REQUEST["userNum"];
	
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

                <img class="logo" src="img/logo.png" onclick="location.href='index.php?bid='">
                <a class="home" onclick="location.href='index.php?bid='"> 홈 </a>
                <a  class="dramatap" onclick="location.href='drama.php?bid=';"> 드라마/시리즈</a>
                <a style="color: #3482EA;" class="movietap" onclick="location.href='movie.php?bid=';"> 영화</a>

                <form class="serch" action="search_result.php" method="get">
                    <input id="searchInput" type="text" placeholder="드라마/시리즈, 영화 제목 검색해주세요" name="search" size="35" required="required" />

                   <input class="serch_Img" name="button" type="image" src="img/serch.png" />
                </form>

                <?php 
	//$_SESSION["userId"] = empty($_SESSION["userId"]) ? "" : $_SESSION["userId"];
	

if(	$_SESSION["userId"]!=""){

	$query3 = $db->query("select *  from user where email='$_SESSION[userId]' "); 
	while ($row = $query3->fetch()) {
	$iset=$row['img_link'];
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
                <img class="user_img" onclick="javascript:Display();" src="user_img/<?= $iset?>">
                <?php
	   }else{
?>
                <button class="login_btn" onclick="location.href='login.php';">로그인</button>
                <?php	   
	   }
?>
            </div>
<img style="position: fixed;margin-left: 250px;     width: 70px;     cursor: pointer;margin-top: 700px;"  onClick="javascript:window.scrollTo(0,0)"src="img/up.png">
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
            <div class="movie_all">
                <p class="movietext"> 영화ㅣ 전체 </p>
                <script>
                    function doDisplay() {
                        var con = document.getElementById("myDIV");
                        if (con.style.display == 'none') {
                            con.style.display = 'block';
                        } else {
                            con.style.display = 'none';
                        }

                    }
                </script>
                       <div class="bar">
                <p id="dok">독점작</p>
				<div style="margin:10px 0 0 430px;">
	<?php
	$Popularity_Newest =isset($_REQUEST["Popularity_Newest"]) ? $_REQUEST["Popularity_Newest"] : "popularity";
		$query3 = $db->query("select * FROM streaming ");
	$styles="font-size: 20px;background-Color: #E5E5E5;	color:#3482EA;";
	$platform =isset($_REQUEST["platform"]) ? $_REQUEST["platform"] : "";
		$bid =isset($_REQUEST["bid"]) ? $_REQUEST["bid"] : "";
		$search =isset($_REQUEST["search"]) ? $_REQUEST["search"] : "";


while ($row = $query3->fetch()) {

?>
<img onclick="location.href='movie.php?platform=<?=$row['provider_id']?>&search=<?=$search?>&bid=<?=$bid?>&Popularity_Newest=<?=$Popularity_Newest?>';" class="where_logo"src="img/<?=$row['logo_path']?>">
<?php
}
?>
<img onclick="location.href='movie.php?bid='" class="where_logo"src="img/all.png">
</div>

                <a id="carta" href="javascript:doDisplay();">⇧ 카테고리</a>

                <div style="display: none;" id="myDIV">
                    <ul>
                        <a href="movie.php?bid=&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>"><li style="<?php if($bid=="")echo $styles; ?>;">전체</li></a>       
                        <a href="movie.php?bid=14&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>"><li style="<?php if($bid==14) echo $styles; ?>">모험</li></a>       
                        <a href="movie.php?bid=16&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>"><li style="<?php if($bid==16) echo $styles; ?>">애니메이션</li></a> 
                        <a href="movie.php?bid=18&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>"><li style="<?php if($bid==18) echo $styles; ?>">드라마</li></a>     
                        <a href="movie.php?bid=27&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>"><li style="<?php if($bid==27) echo $styles; ?>">공포</li></a>       
                        
                    </ul>
                    <ul>
                       <a href="movie.php?bid=28&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>"><li style="<?php if($bid==28) echo $styles; ?>">액션</li></a>
                       <a href="movie.php?bid=35&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>"><li style="<?php if($bid==35) echo $styles; ?>">코미디</li></a> 
                       <a href="movie.php?bid=36&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>"><li style="<?php if($bid==36) echo $styles; ?>">역사</li></a>
                       <a href="movie.php?bid=37&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>"><li style="<?php if($bid==37) echo $styles; ?>">서부</li></a>
                       <a href="movie.php?bid=53&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>"><li style="<?php if($bid==53) echo $styles; ?>">스릴러</li></a>
                    </ul>
                    <ul>
                      <a href="movie.php?bid=80&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>">   <li style="<?php if($bid==80) echo $styles; ?>">범죄      </li></a> 
                      <a href="movie.php?bid=99&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>">   <li style="<?php if($bid==99) echo $styles; ?>">다큐멘터리</li></a> 
                      <a href="movie.php?bid=878&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>">  <li style="<?php if($bid==878) echo $styles; ?>">SF        </li></a>
                      <a href="movie.php?bid=9648&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>"> <li style="<?php if($bid==9648) echo $styles; ?>">미스터리  </li></a>
                      <a href="movie.php?bid=10402&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>"><li style="<?php if($bid==10402) echo $styles; ?>">음악      </li></a>
                    </ul>
                    <ul>
                    <a href="movie.php?bid=10749&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>"><li style="<?php if($bid==10749) echo $styles; ?>">로맨스    </li></a>
                    <a href="movie.php?bid=10751&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>"><li style="<?php if($bid==10751) echo $styles; ?>">가족      </li></a> 
                    <a href="movie.php?bid=10752&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>"><li style="<?php if($bid==10752) echo $styles; ?>">전쟁      </li></a>
                    <a href="movie.php?bid=10759&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>"><li style="<?php if($bid==10759) echo $styles; ?>">액션&어드벤쳐</li></a>
                    <a href="movie.php?bid=10762&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>"><li style="<?php if($bid==10762) echo $styles; ?>">키즈      </li></a>
                    </ul>
                    <ul>
                    <a href="movie.php?bid=10763&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>"><li style="<?php if($bid==10763) echo $styles; ?>">뉴스</li></a> 
                    <a href="movie.php?bid=10764&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>"><li style="<?php if($bid==10764) echo $styles; ?>">리얼리티</li></a> 
                    <a href="movie.php?bid=10765&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>"><li style="<?php if($bid==10765) echo $styles; ?>">공상과학&판타지</li></a>
                    <a href="movie.php?bid=10766&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>"><li style="<?php if($bid==10766) echo $styles; ?>">연속극</li></a>
                    <a href="movie.php?bid=10767&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>"><li style="<?php if($bid==10767) echo $styles; ?>">토크</li></a>
                    </ul>
                    <ul>
                        <a href="movie.php?bid=10768&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>"><li style="<?php if($bid==10768) echo $styles; ?>">시사 </li></a>
                        <a href="movie.php?bid=10770&search=<?=$search?>&platform=<?=$platform?>&Popularity_Newest=<?=$Popularity_Newest?>"><li style="<?php if($bid==10770) echo $styles; ?>">TV 영화 </li></a>

                    </ul>

                </div>
                    <p id="pop"><a style="color: <?php 	if($Popularity_Newest=="popularity"){echo'white';}else{echo'#BDBDBD';}?>;"href="movie.php?Popularity_Newest=popularity&bid=<?=$bid?>&search=<?=$search?>&platform=<?=$platform?>">인기순</a></p>
                    <p id="ll">ㅣ</p>
                    <p id="now"><a style="color:  <?php if($Popularity_Newest!="popularity"){echo 'white';}else{echo'#BDBDBD';}?>;" href="movie.php?Popularity_Newest=release_date&bid=<?=$bid?>&search=<?=$search?>&platform=<?=$platform?>">최신순</a></p>

                </div>

<?php

		$name_array = array();
	$hap=0;
		$count=0;

	$query3 =$db->query("SELECT *  , GROUP_CONCAT(genres.genres_name) AS genrs_names  from movie left join genres ON movie.genre_id LIKE  CONCAT('%',genres.genre_id,'%') 
	where title like '%$search%'and movie.provider_id like '%$platform%' and movie.genre_id LIKE   '%$bid%'  group by movie.id  order by $Popularity_Newest desc
"); 

	while ($row = $query3->fetch()) {

            
        ?>
            <div  class="movies">
            <div style="margin: 90px 0px 0px 24px;" class="div_dda">
<?php

    if(	$_SESSION["userId"]!=""){
        $bookmark=$db->query("select count(*) from  bookmark  where member_num='$_SESSION[userNum]' and review_num='$row[id]'  ")->fetchColumn();

        if($bookmark>0){
        ?>
        <img class="bookmark_yes" src="img/bookmark_yes.png"onclick="location.href='join_bookmark.php?id=<?= $row['id'];?>&choice=movie';">
    
    <?php
        }else{
            ?>
                <img class="bookmark_yes" src="img/bookmark_no.png"onclick="location.href='join_bookmark.php?id=<?= $row['id'];?>&choice=movie';">
    
    <?php
        }
    }
    ?>
                    <a href="choice.php?choice=movie&id=<?=$row['id'];?>">
                        <img  class="movie" src="https://image.tmdb.org/t/p/w220_and_h330_face<?=$row['poster_path'];?>">
                        <p style="top:0px;"  class="hover_text"><?=$row['title']?></p>
                        <p style="top:80px;" class="hover_text"><?=$row['release_date']?></p>
                        <p style="top:130px;" class="hover_text"><?=$row['age']?></p>
                        <p style="top:180px;" class="hover_text"><?=$row['genrs_names']?></p>


                </a>
                </div>
                </div>
                <?php

    $count=$count+1;
    if($count==6){
        $count=0;
        $hap=360+$hap;
        }
}
?>
            </div>
        <div style=" position: absolute;margin: <?=$hap+720?>px 0px 0px;">
        <footer>
            <p class="footer_text">© 2020 TVNNG.COM | 요금제 및 소개 : NETFLIX(넷플릭스) | wavve(웨이브) | 티빙 | 왓챠플레이
                Data & Content Image Based On Netflix.inc , 콘텐츠웨이브(주), Amazon.inc, Watcha.inc, CJ ENM, TiVo Platform Technologies, JestWatch(c)
                Icons made by fonticons.inc | Hosting by Gabia.inc
                <br><br>
                제안 또는 광고문의 : dbswl5@kakao.com</p>
        </footer>
    </div>

</body>

</html>