<?php
	$u_id = $_POST["u_id"];

	include("conn/conn.php");
	$query = mysql_query("delete from address where u_id = '".$u_id."'");
	if(!$query) echo "error";
	else echo "success";
?>