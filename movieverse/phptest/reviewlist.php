<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <style>
	
		
        table     { width:1000px; text-align:center; text-align:20px; font-size: 20px;}
        th        { background-color:#3482EA; }
		td    { text-align:center; border:1px solid gray; word-break:break-all;table-layout:fixed;} 
        
        .review_num      { width: 80px; }
        .review_date     	{ width:120px; }
        .member_num			{ width:50px; }
		.tv_id		{ width:100px; }
		.review			{ width:550px;  }
		.star_rating	{ width:50px; }	
		.good			{ width:50px; }
        
                
        
		
    </style>
</head>

<body>

<h2 style="text-align: center;"> 리뷰정보 </h2>


<table style="margin-left: auto; margin-right: auto;">

    <tr style="font-size:20px; color: #ffffff;">
        <th class="review_num"    >리뷰번호    </th>
        <th class="review_date"  >리뷰날짜    </th>
		<th class="member_num	"  >회원    </th>
		<th class="tv_id	"  >영화ID    </th>
		<th class="review"  >리뷰    </th>
		<th class="star_rating"  >평점    </th>
		<th class="good"  >good   </th>
      
    </tr>
<?php
	
	require("../db_connect.php");
	 
	$query = $db->query("select *  from review");	
	
    while ($row = $query->fetch()) {

?>
		<tr style="border-bottom: 50px solid #fffff;">
            <td><?=$row["review_num"]?></td>
            <td><?=$row["review_date"]?></td>
			<td><?=$row["member_num"]?></td>
			<td><?=$row["tv_id"]?></td>
			<td><?=$row["review"]?><td>
			<td><?=$row["star_rating"]?></td>
			<td><?=$row["good"]?></td>
        </tr>
<?php
	}
?>

</table>

</div>


</body>
</html>