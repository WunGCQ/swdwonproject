<?php
	$a_id = $_POST["a_id"];

	include("conn/conn.php");
	$query = mysql_query("delete from address where a_id = '".$a_id."'");
	if(!$query) echo "error";
	else echo "success";
?>