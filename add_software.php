<?php
	include("conn/conn.php");
	include("function.php");
	date_default_timezone_set('Etc/GMT-8');

	$fileElementName = "nsw_image";
  	$s_datetime = date("Y-m-d h:i:s");

	$imagepath = UploadImage($fileElementName);
	if($imagepath == -1){	echo "上传失败"; exit; }
	else if($imagepath == -2){ echo "图片格式不正确"; exit;}

	$sql = "insert into software(s_name,s_imagepath,s_manufac,s_introd,s_price,s_requirement,s_cate,s_datetime) 
			values('".$_POST["s_name"]."','".$imagepath."','".$_POST["s_manufac"]."','".$_POST["s_introd"]."',
		    '".$_POST["s_price"]."','".$_POST["s_requirement"]."','".$_POST["s_cate"]."','".$_POST["s_datetime"]."')";
	$query = mysql_query($sql,$conn);
	if(!$query) {echo "数据库插入异常"; exit; }
	echo "success";
?>