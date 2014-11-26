<?php
	
	include("conn/conn.php");
	include("function.php");
	date_default_timezone_set('Etc/GMT-8');

	$query = mysql_query("select s_imagepath from software where s_id = '".$_POST["s_id"]."'",$conn);
	$info = mysql_fetch_array($query);
	$o_imagepath = $info["s_imagepath"];
	if(!DeleteImage_sae($o_imagepath)){ echo "删除图片失败"; exit;}

	$fileElementName = "csw_image";
  	$s_datetime = date("Y-m-d h:i:s");

	$imagepath = UploadImage_sae($fileElementName);
	if($imagepath == -1){	echo "上传失败"; exit; }
	else if($imagepath == -2){ echo "图片格式不正确"; exit;}

	$sql = "update software set s_name = '".$_POST["s_name"]."' , s_imagepath = '".$imagepath."' , s_manufac = '".$_POST["s_manufac"]."' , 
			s_introd = '".$_POST["s_introd"]."' , s_price = '".$_POST["s_price"]."' , s_requirement = '".$_POST["s_requirement"]."' where s_id = '".$_POST["s_id"]."'"; 
	$query = mysql_query($sql,$conn);
	if(!$query) {echo "数据库插入异常"; exit; }
	echo "success";
?>