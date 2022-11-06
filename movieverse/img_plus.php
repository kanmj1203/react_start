<?php

$resFile = null;
session_start();
require("db_connect.php");
if ( ! empty( $_FILES['imgFile']['name']  ) ) {

$tempFile = $_FILES['imgFile']['tmp_name'];


$fileTypeExt = explode("/", $_FILES['imgFile']['type']);


$fileType = $fileTypeExt[0];


$fileExt = $fileTypeExt[1];



$extStatus = false;

	switch($fileExt){
		case 'jpeg':
		case 'jpg':
		case 'gif':
		case 'bmp':
		case 'png':     
			$extStatus = true;
			break;
		
		default:
			echo "<script>
				alert('파일 업로드에 실패하였습니다.');
				history.back();</script>";
			break;
	} 

if($fileType == 'image'){
	if($extStatus){
		$resFile = "user_img/{$_FILES['imgFile']['name']}";
		$imageUpload = move_uploaded_file($tempFile, $resFile);
		
		if($imageUpload == true){
		}else{			
			echo "<script>
			alert('파일 업로드에 실패하였습니다.');
			history.back();</script>";
		}
	}else {
			echo "<script>
			alert('파일 확장자는 jpg, bmp, gif, png 이어야 합니다.');
			history.back();</script>";
	}	
}else {
	echo "<script>
			alert('이미지 파일이 아닙니다.');
			history.back();</script>";

	}
	if($resFile){
		$tt= $_FILES['imgFile']['name'];
	$db->exec("update user set img_link='$tt' where member_num='$_SESSION[userNum]'");
	echo "<script>
			alert('파일 업로드 완료.');
			history.back();</script>";

	}
}else{		echo "<script>
			alert('파일이 없다.');
			history.back();</script>";
}
?>