<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<?php
session_start();
	require("db_connect.php");
  	$id =isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";
    $choice =isset($_REQUEST["choice"]) ? $_REQUEST["choice"] : "";
	$date =   date("Y-m-d H:i:s");

  $query3 = $db->query("select *  from bookmark where member_num=$_SESSION[userNum]");

  while ($row = $query3->fetch()) {
      if($row['review_num']==$id){
        $db->query("delete from bookmark where member_num=$_SESSION[userNum] and review_num=$id");
        echo "
            <script>
                alert(\"북마크 삭제가 되었습니다.\");
                history.back();
            </script>
        ";
		 exit;
	  }
	  
  }
  
  

$db->exec("insert into bookmark(member_num,review_num,join_date,choice) values('$_SESSION[userNum]',$id,'$date','$choice')");
	echo "
            <script>
                alert(\"북마크 추가가 되었습니다.\");
                history.back();
            </script>
        ";
  
  
?>



</body>
</html>
