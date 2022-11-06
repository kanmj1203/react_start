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
			
			
			background-color: #3482EA; 
			border: none;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
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
<h2 style="text-align: center;"> movie 정보 <p><input class="rect3" type="button" value="작품추가" onclick="location.href='write.php'"><br><br></p></h2>



<table style="margin-left: auto; margin-right: auto;">

    <tr style="font-size:20px; color: #ffffff;">
        <th class="id"    >번호    </th>
        <th class="original_title"  >오리지널 제목    </th>
        <th class="title" >제목  </th>
        <th class="release_date">개봉일</th>
        
    </tr>
<?php

	require("../db_connect.php");
	
	$query = $db->query("select * from movie");	
    while ($row = $query->fetch()) {

?>

		<tr style="border-bottom: 50px solid #fffff;"	>
            <td><?=$row["id"]?></td>
            <td style="text-align:left;">
                <a href="view.php?id=<?=$row["id"]?>">
                    <?=$row["original_title"]?>
                </a>
            </td>
    
            <td><?=$row["title"]?></td>
			<td><?=$row["release_date"]?></td>
			
        </tr>
<?php
	}
?>

</table>

</div>


</body>
</html>