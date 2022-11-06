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
        table     { width:1200px; text-align:center; text-align:20px; font-size: 20px;}
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

	<a href="/movieverse/index.php"><img class="logo"src="/movieverse/img/logo.png"></a>			<!-- 링크걸기 -->
</div>
<div class="sidenav">
  <a href="../list.php">관리자 페이지</p>
  <a href="../user/list.php">회원 정보</a>
  <br><br>
  <a href="../movie/list.php">영화 정보</a>
  <br><br>
  <a href="../tv/list.php">TV 정보</a>
 
</div>

<h1 style="text-align: center;"> 관리자 페이지 </h1>
<h2 style="text-align: center;"> User 정보 </h2>



<table style="margin-left: auto; margin-right: auto;">

    <tr style="font-size:20px; color: #ffffff;">
        <th class="member_num"    >번호    </th>
        <th class="email"  >이메일    </th>
        <th class="nickname" >닉네임  </th>
        <th class="join_date">가입날짜</th>
        <th class="bookmark_num" >북마크  </th>
        <th class="review_num" >리뷰  </th>
        
    </tr>
<?php

	require("../db_connect.php");
	
	$query = $db->query("select * from user");	
    while ($row = $query->fetch()) {

?>



		<tr style="border-bottom: 50px solid #fffff;"	>
            <td><?=$row["member_num"]?></td>
            <td style="text-align:left;">
                <a href="view.php?member_num=<?=$row["member_num"]?>">
                    <?=$row["email"]?>
                </a>
            </td>
    
            <td><?=$row["nickname"]?></td>
			<td><?=$row["join_date"]?></td>
			<td><?=$row["bookmark_num"]?></td>
			<!-- <td><?=$row["review_num"]?></td> -->
        </tr>
<?php
	}
?>

</table>



</body>
</html>