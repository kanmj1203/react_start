<html>
    <head>
    <meta charset="utf-8">
    </head>
    <body>
        <?php
//  header('Content-Type: text/html; charset=UTF-8');
 
//  //변수에 한글이 포함될 경우 아래 코드를 추가한다.
//  putenv("LANG=ko_KR.UTF-8");
//  setlocale(LC_ALL, 'ko_KR.utf8');


//  $변수1 = "AAA";
//  $변수2 = "가나다";
//  $변수3 = "가 나 다"; //공백이 있을경우 문자열로 묶어줘야 함 //exec("python3 python.py ".$변수1." ".$변수2." \"".$변수3."\"", $output);
// exec("cd ./py/MovieConnect.py", $output, $status);

// //이렇게 하는 이유는 경로를 지정해주고 python3를 실행해야 정상적으로 작동.


//  //$rt=exec("ls");
//  //echo $rt;
// if($status){
// echo(json_encode($output));
// echo $output;
//  //print_r($output);
//  echo $output[0]. ""; //Success1 good
//  echo $output[1]. ""; //Success2
//  print_r($output);
// }


$method = "GET";
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
*/
$api_key = '13e4eba426cd07a638195e968ac8cf19';
$data = array(
    'api_key' => $api_key,
    // 'with_watch_providers' => 8,
    // 'with_watch_providers' => 337,
    // 'with_watch_providers' => 97,
    // 'with_watch_providers' => 356,
    'watch_region' => 'KR',
    'language' => 'ko',
    'page' => 1,
    'sort_by' => 'popularity.desc',
);

$provide = array(
    'api_key' => $api_key,
    // 'provider_id' => 8,
    // 'provider_id' => 337,
    // 'provider_id' => 97,
    // 'provider_id' => 356,
);
$base_url = 'https://api.themoviedb.org/3/discover/movie';
$provide_base_url = 'https://api.themoviedb.org/3/watch/providers/tv';
$provide_link_url = 'https://api.themoviedb.org/3/watch/providers/movie?api_key='.$api_key.'&language=Ko';

$url = $base_url . "?" . http_build_query($data, '', );
$url2 = $provide_base_url . "?" . http_build_query($provide, '', );
$url3 = $provide_link_url;

$ch = curl_init();                                 //curl 초기화
curl_setopt($ch, CURLOPT_URL, $url3);               //URL 지정하기
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환 
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);      //connection timeout 10초 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);   //원격 서버의 인증서가 유효한지 검사 안함 
//curl_setopt($ch, CURLOPT_SSLVERSION, 3); // SSL 버젼 (https 접속시에 필요)
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
 
$response = curl_exec($ch);

$sResponse = json_decode($response , true);		//배열형태로 반환

$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);
 
$providers_id = ['8', '337', '97', '356'];
// return $response;
// function getTitle($count) {
    // $a = $sResponse['results'];
    // for ($i=0; $i<count($sResponse['results']); $i++) {
        // print($sResponse['results'][$i]['title']);
        // $a =  $sResponse['results'];
        // print_r($sResponse['results'][$i]);
        print("<br><br>");
        print_r($sResponse['results']);
    // }
    // }
    // foreach($providers_id as $a) {
    // print_r($sResponse["results"]);
                        // $provider_logo_path = [];
                        // for ($i=0; $i < count($sResponse["results"]); $i++) {
                        //     foreach ($providers_id as $aa) {
                        //         if ($aa == $sResponse["results"][$i]['provider_id']) {
                        //             array_push($provider_logo_path, $sResponse["results"][$i]['logo_path']);
                                    
                        //     } else {

                        //     }
                        // }
                        // // print_r($sResponse["results"][$i]);
                        // }
                        // foreach($provider_logo_path as $prov_logo_path) {
                        //     ?>
                        // <img src="https://image.tmdb.org/t/p/original/<?=$prov_logo_path?>">
                        // <?php
                        // }
    // print("<br><br>");
    // }
// }
// print("<br><br><br>" . $url);

        ?>
        <main>
        <?php
                for ($i = 0; $i < count($sResponse['results']); $i++) {
                ?>
            <!-- <div><?= print_r($a) ?></div> -->
            <div style="width : auto; height : 330px;
	overflow:hidden;
	text-align:center;
	margin: 0 auto;">
            <!-- https://www.themoviedb.org/t/p/w220_and_h330_face/sLTAEFtjentQ5satiGdmv7o2f1C.jpg -->
                    <img 
                    style="width : 300px; height : auto; display : flex; object-fit:cover;"
                    src=" https://image.tmdb.org/t/p/original/<?=$sResponse['results'][$i]['backdrop_path']?>" 
                    alt="">
            </div>
    <?php
        }
        ?>
        </main>
    </body>
</html>