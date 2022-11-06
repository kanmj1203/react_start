<?php
	
	
	$member_num = $_REQUEST["member_num"];
	
	
	require("../db_connect.php");
	
	$query = $db->query("select * from user where member_num=$member_num");
    if ($row = $query->fetch()) {
		$email  = str_replace(" ", "&nbsp;", $row["email"]);
		$nickname = str_replace(" ", "&nbsp;", $row["nickname"]);
		$join_date = str_replace(" ", "&nbsp;", $row["join_date"]);
		$bookmark_num  = str_replace(" ", "&nbsp;", $row["bookmark_num"]);
		$review_num = str_replace(" ", "&nbsp;", $row["review_num"]);
		$img_link = $row["img_link"];
		
	}

?>
<br>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        table { width:1200px; text-align:center; }
        th    { width:200px; background-color:#3482EA; }
        td    { text-align:center; border:1px solid gray; word-break:break-all;table-layout:fixed;} 
		
		
		html, body {
			width:100%;
			padding-top: 24.5px;
			height:100%;
		}
		
		
		
		
		
        
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
			
			background-color: #3482EA; 
			border: none;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
	}
	
	
	
	
		.review_num      { width: 100px; }
        .review_date     	{ width:150px; }
        
		.title	{ width:400px; }
		.review			{ width:700px;  }
		.star_rating	{ width:50px; }	
		.good			{ width:50px; }
		.del		{ width:50px; }
		
		
		.bookmark_num { width: 100px; }
		.join_date     	{ width:150px; }
		
		
		
		
    </style>
</head>

<body>
<div class="all">
 <div class="head">
	<a href="/movieverse/index.php"><img class="logo"src="/movieverse/img/logo.png"></a>			<!-- 링크걸기 -->

</div>
<body>

<div class="sidenav">
  <a href="../list.php">관리자 페이지</p>
  <a href="../user/list.php">회원 정보</a>
  <br><br>
  <a href="../movie/list.php">영화 정보</a>
  <br><br>
  <a href="../tv/list.php">TV 정보</a>
 
</div>


	<h1 style="text-align: center;"> 관리자 페이지 </h1>
	<h2 style="text-align: center;"> User 정보  </h2>
	


<table style="margin-left: auto; margin-right: auto;">

	<tr>
        <th>이메일</th>
        <td><?=$row["email"]?><br></td>
    </tr>
    <tr>
        <th>닉네임</th>
        <td><?=$row["nickname"]?><br></td>
    </tr>
    <tr>
        <th>가입날짜</th>
        <td><?=$row["join_date"]?><br></td>
    </tr>
    <tr>
        <th>북마크</th>
       <td><?=$row["bookmark_num"]?><br></td>
    </tr>
    <tr>
        <th>리뷰</th>
        <td><?=$row["review_num"]?><br>
		</td>
    </tr>
    
	

    <tr>
    	<th>프로필</th>
		<td>
		<?php if($row["img_link"] == "user_img.png"){ 
		?>
		이미지 없음
		
		<?php
			} else {
		?>
			<img src="/html/user_img/<?=$row["img_link"]?>"width="200" height="200"></td>
		<?php
			}
		?>
    </tr>
	
	 <tr>
    	<th>회원삭제</th>
		<td>
		<input class="rect3" type="button" value="삭제" onclick="location.href='delete.php?member_num=<?=$member_num?>'">
		</td>
    </tr>
	
</table>

<h2 style="text-align: center;"> 회원 리뷰목록 </h2>


<table style="margin-left: auto; margin-right: auto;">

    <tr style="font-size:20px; color: #ffffff;">
        <th class="review_num"    >번호    </th>
        <th class="review_date"  >리뷰날짜    </th>
		<th class="title	"  >작품  </th>
		<th class="review"  >리뷰    </th>
		<th class="star_rating"  >평점    </th>
		<th class="good"  >good   </th>
		<th class="del"  >삭제   </th>
			
      
    </tr>
<?php
	
	require("../db_connect.php");
	$query = $db->query("SELECT
					r.review_num,
					r.member_num,
					t.title as tv_title,
					m.title as movie_title,
					r.movie_id,
					r.tv_id,
					
					r.review_date,
					r.review,
					r.star_rating,
					r.good
					FROM review AS r
					LEFT JOIN tv AS t 
					ON r.tv_id = t.id 
					LEFT JOIN movie AS m
					ON r.movie_id = m.id;"); 
	
	
					
	
	
    while ($row = $query->fetch()) {

	if($row["member_num"]==$member_num){
		
?>
		<tr style="border-bottom: 50px solid #fffff;">
            <td style="text-align:center"><?=$row["review_num"]?></td>
            <td style="text-align:center"><?=$row["review_date"]?></td>
			
			
			<td style="text-align:center">
				<?php
					if($row["movie_title"]==null){
				?>
						<?=$row["tv_title" ]?>(TV)
				<?php
					} else if($row["tv_title"]==null){
				?>
						<?=$row["movie_title"]?>(영화)
				<?php
					}
				?>
			</td>
			
			
			<td style="text-align:center"><?=$row["review"]?></td>
			<td style="text-align:center"><?=$row["star_rating"]?></td>
			<td style="text-align:center"><?=$row["good"]?></td>
			<td><a href="rvdel.php?review_num=<?=$row["review_num"]?>&id=<?=$id?>">댓글삭제</a></td>
			
        </tr>
<?php
	}
}
?>

</table>





</table>

<h2 style="text-align: center;"> 회원 북마크 목록 </h2>


<table style="margin-left: auto; margin-right: auto;">

    <tr style="font-size:20px; color: #ffffff;">
        <th class="bookmark_num"    >번호    </th>
		<th class="title"  >작품    </th>
		<th class="join_date	"  >마크날짜   </th>
        
			
    </tr>
<?php
	
	require("../db_connect.php");
	 
	$query = $db->query("select *  from bookmark");	
	
	
		$query = $db->query("SELECT
					b.bookmark_num,
					b.member_num,
					t.title as tv_title,
					m.title as movie_title,
					b.member_num,
					b.join_date,
					b.choice
					
					FROM bookmark AS b
					LEFT JOIN tv AS t 
					ON b.review_num = t.id 
					LEFT JOIN movie AS m
					ON b.review_num = m.id;"); 
					
	
	
    while ($row = $query->fetch()) {

	if($row["member_num"]==$member_num){
		
?>
		<tr style="border-bottom: 50px solid #fffff;">
            <td style="text-align:center"><?=$row["bookmark_num"]?></td>	
			
			
			
			<td style="text-align:center">
				<?php
					if($row["choice"]=="tv"){
				?>
						<?=$row["tv_title" ]?>(TV)
				<?php
					} else if($row["choice"]=="movie"){
				?>
						<?=$row["movie_title" ]?>(영화)
				<?php
					}
				?>
			</td>
			<td style="text-align:center"><?=$row["join_date" ]?> </td>
			
			
        </tr>
<?php
	}
}
?>

</table>



</div>
	
</body>
</html>