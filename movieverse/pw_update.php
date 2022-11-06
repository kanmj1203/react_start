<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<?php
	$userpw =isset($_REQUEST["userpw"]) ? $_REQUEST["userpw"] : "";
	$new_pw =isset($_REQUEST["new_pw"]) ? $_REQUEST["new_pw"] : "";
	$ps_ok =isset($_REQUEST["ps_ok"]) ? $_REQUEST["ps_ok"] : "";
	
	require("db_connect.php");
	session_start();

	if(!($ps_ok && $new_pw && $ps_ok)) {//하나라도 빈칸 있으면
		
?>
	<script>
		alert('빈칸 없이 입력해야 합니다.');
		history.back();
	</script>
<?php
	}else{
		if($userpw!=$_SESSION["userPw"]){
		?>
	<script>
		alert('현재 비밀번호가 틀립니다.');
		history.back();
	</script>
<?php	
	}else{
		if($new_pw!=$ps_ok){
			
			?>
	<script>
		alert('비밀번호 확인이 틀립니다.');
		history.back();
	</script>
<?php			
		}else{
		$db->exec("update user set passwd='$ps_ok' where email='$_SESSION[userId]'");
		$_SESSION["userPw"]	=	$ps_ok;
?>
	<script>
		alert('비밀번호가 변경되었습니다..');
		location.href="pwre.php";
	</script>	
	<?php
	}
	}
	}
	?>
</body>
</html>
