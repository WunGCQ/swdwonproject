<?php
	
	include("conn/conn.php");
	$u_id = $_POST["u_id"];
	$u_email = $_POST["u_email"];

	$query = mysql_query("update user set u_email = '".$u_email."' where u_id = '".$u_id."'",$conn);
	if(!$query) echo "error";
	else echo "success";
?>