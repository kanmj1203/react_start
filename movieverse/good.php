<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<?php
require("db_connect.php");
session_start();
	if(!$_SESSION["userId"]){
		?>
	<script>
		alert('로그인 후 이용 가능');
		history.back();
	</script>
<?php
	}
$req=$_REQUEST["member_num"];
$id =isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";
$tv_movie=$_GET['choice'];
		if($tv_movie=='tv'){
		$tv_movie='tv_id';
		}else{
		$tv_movie='movie_id';
		}
	$re=$db->query("SELECT * FROM review, good WHERE good.good_yes=$req and good.id=$id and good.member_num=$_SESSION[userNum] and review.$tv_movie=$id AND review.member_num=$req;  ")->fetchColumn();
if($re>0){
$db->exec("update review set good=good-1 where $tv_movie=$id and member_num=$req ");
$db->exec("delete from good where id=$id and member_num=$_SESSION[userNum] and good_yes=$req");
 echo "
      <script>
          alert('좋아요 취소');
      history.back();
      </script>
  ";


}else{
$db->exec("update review set good=good+1 where $tv_movie=$id and member_num=$req");
$db->exec("insert into good (member_num,id,good_yes) 	values('$_SESSION[userNum]','$id',$req)");



 echo "
      <script>
          alert('좋아요 클릭');
          history.back();
      </script>
  ";
}





?>
</body>
</html>
