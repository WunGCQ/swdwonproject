<?php
	
	include("conn/conn.php");
	$s_id = $_POST["s_id"];
	$query = mysql_query("delete from software where s_id = '".$s_id."'",$conn);
	if(!$query) echo "error";
	else echo "success";s
?>