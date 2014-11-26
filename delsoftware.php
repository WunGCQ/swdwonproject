<?php
	
	include("conn/conn.php");
	include("function.php");
	$s_id = $_POST["s_id"];

	$query = mysql_query("select s_imagepath from software where s_id = '".$s_id."'",$conn);
	$info = mysql_fetch_array($query);
	
	if(!DeleteImage_sae($info["s_imagepath"])){
        echo "删除图片失败";
        exit;
	}

	$query = mysql_query("delete from software where s_id = '".$s_id."'",$conn);
	if(!$query) echo "删除记录失败";
	else echo "success";s
?>