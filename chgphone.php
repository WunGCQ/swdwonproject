<?php
	
	include("conn/conn.php");
	$u_id = $_POST["u_id"];
	$u_telephone = $_POST["u_telephone"];

	$query = mysql_query("update user set u_telephone = '".$u_telephone."' where u_id = '".$u_id."'",$conn);
	if(!$query) echo "error";
	else echo "success";
?>