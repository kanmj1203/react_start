<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <style>
	
		
        table     { width:300px; text-align:center; text-align:20px; font-size: 20px;}
        th        { background-color:#3482EA; }
        
        .genre_id      { width: 100px; }
        .genres_name     	{ width:200px; }
        
        
                
        
		
    </style>
</head>

<body>

<h2 style="text-align: center;"> 장르 정보 </h2>


<table style="margin-left: auto; margin-right: auto;">

    <tr style="font-size:20px; color: #ffffff;">
        <th class="genre_id"    >장르ID    </th>
        <th class="genres_name"  >장르    </th>
        
    </tr>
<?php

	require("../db_connect.php");
	
	$query = $db->query("select * from genres");	
    while ($row = $query->fetch()) {

?>



		<tr style="border-bottom: 50px solid #fffff;"	>
            <td><?=$row["genre_id"]?></td>
            <td style="text-align:left;">
                
                    <?=$row["genres_name"]?>
            </td>
   		
        </tr>
<?php
	}
?>

</table>

</div>


</body>
</html>