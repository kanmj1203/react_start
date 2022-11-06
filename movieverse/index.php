<?php

/*
넷플 : 
{
    "display_priority": 0,
    "logo_path": "/9A1JSVmSxsyaBK4SUFsYVqbAYfW.jpg",
    "provider_name": "Netflix",
    "provider_id": 8
    },

왓챠 :
{
    "display_priority": 3,
    "logo_path": "/cNi4Nv5EPsnvf5WmgwhfWDsdMUd.jpg",
    "provider_name": "Watcha",
    "provider_id": 97
},

디즈니 : 
{
    "display_priority": 1,
    "logo_path": "/dgPueyEdOwpQ10fjuhL2WYFQwQs.jpg",
    "provider_name": "Disney Plus",
    "provider_id": 337
},

웨이브 :
{
    "display_priority": 2,
    "logo_path": "/8N0DNa4BO3lH24KWv1EjJh4TxoD.jpg",
    "provider_name": "wavve",
    "provider_id": 356
},
*/

$method = "GET";
$api_key = '13e4eba426cd07a638195e968ac8cf19';

// 영화 데이터
$data = array( 
    // 최신순
    array(
        'api_key' => $api_key,
        'with_watch_providers' => 8,
        'with_watch_providers' => 337,
        'with_watch_providers' => 97,
        'with_watch_providers' => 356,
        'sort_by' => 'release_date.desc',
        'watch_region' => 'KR',
        'language' => 'ko',
        'page' => 1
    ),
    // 인기순
    array(
        'api_key' => $api_key,
        'with_watch_providers' => 8,
        'with_watch_providers' => 337,
        'with_watch_providers' => 97,
        'with_watch_providers' => 356,
        'sort_by' => 'popularity.desc',
        'watch_region' => 'KR',
        'language' => 'ko',
        'page' => 1
    ),
    // 플랫폼 가져오기
    array(
        'api_key' => $api_key
    )
);

// 드라마/시리즈 데이터
// $tv_data = array(
//     'api_key' => '13e4eba426cd07a638195e968ac8cf19',
//     'with_watch_providers' => 8,
//     'watch_region' => 'KR',
//     'language' => 'ko',
//     'page' => 1
// );

// URL 지정
$base_url = 'https://api.themoviedb.org/3';

$url = array(
    // 최신순
    $base_url . "/discover/movie?" . http_build_query($data[0], '', ),
    $base_url . "/discover/tv?" . http_build_query($data[0], '', ),
    // 인기순
    $base_url . "/discover/movie?" . http_build_query($data[1], '', ),
    $base_url . "/discover/tv?" . http_build_query($data[1], '', ),
    // 플랫폼
    $base_url . "/watch/providers/tv?" . http_build_query($data[2], '', )
);

// TMDB API에서 데이터 불러오기
for($i = 0; $i < count($url); $i++){
    $ch = curl_init();                                 //curl 초기화
    curl_setopt($ch, CURLOPT_URL, $url[$i]);               //URL 지정하기
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환 
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);      //connection timeout 10초 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);   //원격 서버의 인증서가 유효한지 검사 안함 
    //curl_setopt($ch, CURLOPT_SSLVERSION, 3); // SSL 버젼 (https 접속시에 필요)
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    
    $response = curl_exec($ch);

    $sResponse[$i] = json_decode($response , true);		//배열형태로 반환

    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);
}

// 플랫폼 id 리스트
$providers_id = [8, 337, 97, 356];

// TMDB에서 이미지 가져오기
$tmdb_img_base_url = "https://image.tmdb.org/t/p/original/";

// 시나리오
$overview = $sResponse[2]['results'][0]['overview'];
// 공백문자, 줄바꿈 치환
$overview = str_replace(" ", "&nbsp;", $overview); //공백
$overview = str_replace("\n", "<br>", $overview); //줄바꿈

// return $response;
// function getTitle($count) {
    // $a = $sResponse['results'];
    // for ($i=0; $i<count($sResponse['results']); $i++) {
    //     // print($sResponse['results'][$i]['title']);
    //     // $a =  $sResponse['results'];
    //     print_r($sResponse['results'][$i]);
    //     print("<br><br>");
        
    // }
// }
// print("<br><br><br>" . $url);

             
        ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>MovieVerse</title>
    <link rel="shortcut icon" href="./img/logo/logo_text_x.png">

    <!--css 링크-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/basic.css">
	<link rel="shortcut icon" href="#">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> <!--자동완성 기능 autocomplete-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


</head>

<script>
List = [];  // 배열 생성
</script>


<div>   <!--session 생성-->
    <?php 
        require("db_connect.php");
        session_start();
        $_SESSION["userId"] = empty($_SESSION["userId"]) ? "" : $_SESSION["userId"];
        
        $query3 = $db->query("SELECT title FROM tv UNION SELECT title  FROM movie "); 
        while ($row = $query3->fetch()) {
    ?>
    <script> // 영화 제목 리스트 추가 (자동완성 리스트)
        List.push('<?=$row['title'];?>');
    </script>
    <?php
    }
    ?>
</div>

<!--검색-->
<script>
    $(function() {
        $("#searchInput").autocomplete({
            source: List,   // 자동완성 대상
            focus: function(event, ui) { //포커스 시 이벤트
                return false;
            },
            minLength: 1,   // 최소 글자 수
            delay: 100,     //글자 입력 후 이벤트 발생까지 지연 시간
        });
    });
</script>
<body>
    <div class="all"> <!--전체 너비 설정-->
        <header class="header_scroll_top">
            <div class="head">  <!--header GNB-->
                <div class="header_left">
                    <img class="logo" onclick="location.href='index.php'" src="img/logo/logo_txt.png">
                    <!-- <a style="color: #3482EA;" class="home" onclick="location.href='index.php?bid='"> 홈 </a> -->
                    <a class="movietap" onclick="location.href='movie.php?bid=';"> 영화</a>
                    <a class="dramatap" onclick="location.href='drama.php?bid=';"> 드라마/시리즈</a>

                    <?php 
                        if($_SESSION["userId"]=="admin") {
                    ?>
                        <a class="admintap" onclick="location.href='./phptest/list.php';"> 관리자 페이지</a>
                    <?php  
                    } 
                    ?>
                </div>  <!--header_left END-->
                
			    <form class="serch" action="search_result.php" method="get">
                    <input class="serch_Img" name="button" type="image" src="img/search_img.png" />
                    <input id="searchInput" type="text" name="search" 
                    placeholder="Search" onfocus="this.placeholder=''" onblur="this.placeholder='Search'"
                    size="50" required="required"/>
                </form>
                <?php 
                // 사용자 프로필 사진
                if($_SESSION["userId"]!=""){ // 로그인 됐을 경우
                    $query3 = $db->query("select * from user where email='$_SESSION[userId]'"); 
                    while ($row = $query3->fetch()) {
                        $iset=$row['img_link'];
                    }
                ?>
                    <script>
                        function doDisplay() {
                            var asd = document.getElementById("userDiv");
                            if (asd.style.display == 'none') {
                                asd.style.display = 'block';
                            } else {
                                asd.style.display = 'none';
                            }
                        }
                    </script>
                    <img class="user_img" onclick="javascript:doDisplay();" src="user_img/<?= $iset?>">
                <?php
	             }else{ // 로그아웃일 경우
?>
                    <button class="login_btn" onclick="location.href='login.php';">로그인</button>
                <?php	   
                }
?>
            </div> <!--header END-->

            <div style="display: none;" id="userDiv"><!--유저 정보 프로필-->
                <h3><img style="width:40px;height:40px;"class="userimg" src="user_img/<?= $iset?>"><?=$_SESSION["userName"]?></h3>
                <ul>
                    <li onclick="location.href='myinfo.php';"><img class="userimg" src="img/user.png">내 계정정보</li>
                    <li onclick="location.href='pwre.php';"><img class="userimg" src="img/lock.png">비밀번호 수정</li>
                    <li onclick="location.href='mybook.php';"><img class="userimg" src="img/bookmark.png">내 북마크</li>
                    <li onclick="location.href='myreview.php';"><img class="userimg" src="img/review.png">작성한 평가</li>
                    <li onclick="location.href='log_out.php';"><img class="userimg" src="img/logout.png">로그아웃 </li>
            </div>  <!--userDiv END-->
        </header>
        <div id='wrap'>
            <div class="main_img_div"><!--메인 이미지-->
                <!-- 인기 영화 메인화면에 출력 -->
                <img class="main_img" src="<?=$tmdb_img_base_url.$sResponse[2]['results'][0]['backdrop_path']?>">
                <div style="width : 100%;" class="main_text">
                    <span class="main_title"><?=$sResponse[2]['results'][0]['title']?></span>
                    <p class="main_scenario"><?=$overview?></p>
                    <a href="#"class="main_view_detail">상세 보기</a>
                </div>

            <div class="main_img_gradient_top"></div>
            <div class="main_img_gradient_bottom"></div>
            </div><!--main_img_div END-->

            <!-- 페이지 기능 설명 이미지-->
            <!-- <div class="img_logose">    
                <img style="margin-left:374px" class="main_img1_logos" src="img/main11.png"/>    
                <img style="margin-left:690px" class="main_img1_logos" src="img/main22.png"/>
                <img style="margin-left:1030px" class="main_img1_logos" src="img/main33.png"/>
                <img style="margin-left:1330px" class="main_img1_logos" src="img/main4.png"/>
                <p>
            </div> -->
           
<?php
$list_arr = [["영화 최신 순", "movie_release_list", "movie"],
            ["드라마 최신 순", "drama_release_list", "drama"],
            ["영화 인기 순", "movie_popularity_list", "movie"],
            ["드라마 인기 순","drama_popularity_list", "drama"]];

$list_count = 0;   

foreach($list_arr as $main_lists){
?>
            <div class="main_content_view">
                <!--드라마 리스트-->
                <p class="tv"><?=$main_lists[0]?></p>
                <p class="plus" onclick="location.href='movie.php?bid=';">ALL</p>
                <!--드라마 좌우이동-->
                <div class="move_buttons">
                    <div class="left" onclick='move("left","<?=$main_lists[1]?>")' text="<"></div>  
                    <div class="right" onclick='move("right","<?=$main_lists[1]?>")' text=">"></div>  
                </div>
                <div class="show"><!--리스트 보여지는 틀-->
                    <div class="movies"><!--드라마 리스트 이미지 출력-->
<?php
                    $pxs=0;
             
    for ($i = 0; $i < count($sResponse[0]['results']); $i++) {
    ?>
                        <div class="main_poster_img_wrap" onclick="location.href='choice.php?choice=<?=$main_lists[2]?>&id=<?=$sResponse[$list_count]['results'][$i]['id']?>';">
                            <img class="main_poster_img" 
                            src="<?=$tmdb_img_base_url.$sResponse[$list_count]['results'][$i]['poster_path']?>" 
                            alt=""
                            onerror="this.style.display='none'">
                        </div>
    <?php
        }

        ?>

<?php
                    $pxs=24;
                    $list_count++;
?>
                    </div>
                </div> <!--show END-->
            </div>  <!--main_content_view-->

            <?php
            }

            ?>
        
            </div>
        </div><!--main END-->

            <!--footer-->
            <footer class="footer">
                <div class="footer_logos">
        <?php

$provider_logo_path = [];
for ($res_count=0; $res_count < count($sResponse[4]["results"]); $res_count++) {
    foreach ($providers_id as $prov_id) {
        if ($prov_id == $sResponse[4]["results"][$res_count]['provider_id']) {
            array_push($provider_logo_path, $sResponse[4]["results"][$res_count]['logo_path']);
        } else {
        }
    }
}

$prov_count = 0;
foreach($provider_logo_path as $prov_logo_path){
        ?>
                <div class="footer_img" onclick="location.href='movie.php?platform=<?=$providers_id[$prov_count]?>';"><img src="<?=$tmdb_img_base_url.$prov_logo_path?>"></div>
    <?php
    $prov_count++;
}
    ?>
    </div>
                <p class="footer_text">신구대학교 팀프로젝트 6조
                    <br>
                    권은진 강민지 천서정 시지원 김나영
                    <br><br>
                    성남시 중원구 광명로377(금광2동 2685) 신구대학교 산학관 110호 
                </p>
            </footer>
            <!--footer END-->
</body>
</html>

<script>

//브라우저 실시간 크기 가져오기
let windowWidth = window.innerWidth;
$(window).resize(function() {
    windowWidth = window.innerWidth;
    // console.log(windowWidth);
}).resize(); 
// 스크롤 시 header fade-in
$(function(){
    $(document).on('scroll', function(){
        if($(window).scrollTop() > 100){
            $("header").removeClass("header_scroll_top");
            $("header").addClass("header_scroll_down");
        }else{
            $("header").removeClass("header_scroll_down");
            $("header").addClass("header_scroll_top");
        }
    })
});


    // 마우스 오버시 좌우 이동 보이게
    let show = document.querySelectorAll('.show');
    let move_buttons = document.querySelectorAll('.move_buttons');
    let left_btn = document.querySelectorAll('.left');
    let right_btn = document.querySelectorAll('.right');

    for(let i = 0; i < show.length; i++){
        show[i].addEventListener("mouseover", function () {
            move_buttons[i].style.opacity = "100";
        }, false);
    

        move_buttons[i].addEventListener("mouseover", function () {
            move_buttons[i].style.opacity = "100";
        }, false);
    

        show[i].addEventListener("mouseout", function(){
            move_buttons[i].style.opacity = "0";
        }, false);
    }

    // 리스트 화면 이동 기능
    function move(type, check) {
        if (check == 'movie_release_list') {
            var check = 0;
        } else if (check == 'drama_release_list') {
            var check = 1;
        } else if (check == 'movie_popularity_list') {
            var check = 2;
        } else if (check == 'drama_popularity_list') {
            var check = 3;
        }
        var tab = document.querySelectorAll('.movies');
        var marginLeft = window.getComputedStyle(tab[check]).getPropertyValue('margin-left');

        // let aaa = document.querySelector('.main_poster_img');
        // var aaa1 = window.getComputedStyle(aaa[0]).getPropertyValue('width');

        let slide_count = 0;
        marginLeft = parseInt(marginLeft);
        console.log(marginLeft);
        console.log(tab[check].scrollWidth);
        // if (type === 'right' && marginLeft != - windowWidth) {
        //     var a = marginLeft - windowWidth;
        //     tab[check].style.marginLeft = a + 'px';  // 마진값 변경하여 좌 우 이동
        //     tab[check].style.transition = `${0.4}s ease-out`;    // 이동 시 딜레이 주어 부드럽게

        // } else if (type === 'left' && marginLeft != 0) {
        //     var a = marginLeft + windowWidth;
        //     tab[check].style.marginLeft = a + 'px';
        //     tab[check].style.transition = `${0.4}s ease-out`;
        // }
        move_buttons[check].style.pointerEvents = 'none';
        if (type === 'right' && marginLeft > -tab[check].scrollWidth) {
            // marginLeft = marginLeft > 0 ? 0 : marginLeft;
            var a = marginLeft - windowWidth;

            tab[check].style.marginLeft = a + 'px';  // 마진값 변경하여 좌 우 이동
            tab[check].style.transition = `${0.4}s ease-out`;    // 이동 시 딜레이 주어 부드럽게
            

        } 
        if (type === 'left' && marginLeft < 0) {
            // marginLeft = marginLeft < 0 ? 0 : marginLeft;
            var a = marginLeft + windowWidth;

            tab[check].style.marginLeft = a + 'px';
            tab[check].style.transition = `${0.4}s ease-out`;
            
        } else {
            
        }
        // 중복 클릭 방지
        setTimeout(() => { 
            move_buttons[check].style.pointerEvents = 'auto';
        }, 400);
    }

</script>