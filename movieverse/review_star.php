<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<?php
session_start();
	if(!$_SESSION["userId"]){
		?>
	<script>
		alert('로그인 후 이용 가능');
		history.back();
	</script>
<?php
	}

	$tr =isset($_REQUEST["textreview"]) ? $_REQUEST["textreview"] : "";
	$sv =isset($_REQUEST["starvalue"]) ? $_REQUEST["starvalue"] : "";
	$id =isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";
	require("db_connect.php");

	if(!($tr && $sv )) {

?>
	<script>
		alert('별점과 리뷰가 빈 곳 없이 입력해야 합니다.');
		history.back();
	</script>

<?php
	}else{

		$count=$db->query("select count(*) from review ")->fetchColumn()+1;
		$tv_movie=$_GET['choice'];
		if($tv_movie=='tv'){
		$tv_movie='tv_id';
		}else{
		$tv_movie='movie_id';
		}
			$date =   date("Y-m-d H:i:s");

	$re=$db->query("select count(*) from review where $tv_movie=$id and member_num=$_SESSION[userNum]")->fetchColumn();
		
if($re>0){
$sv=$sv/16;

 $db->exec("update  review set  
								review_date = '".$date."'	,
								member_num = '".$_SESSION['userNum']."'	,
								review = '".$tr."'	,
								star_rating = '".$sv."'	,
								$tv_movie = '".$id."'	
						where $tv_movie='".$id."' and member_num='".$_SESSION['userNum']."'");
}else{

$db->exec("insert into review (
		  review_date,member_num,review,star_rating,$tv_movie)
	values('$date','$_SESSION[userNum]','$tr',$sv/16,'$id')");
	
}
 echo "
      <script>
          alert('리뷰가 작성되었습니다');
          location.href = 'choice.php?choice=$_GET[choice]&id=$id';
      </script>
  ";
}
?>
</body>
</html>
