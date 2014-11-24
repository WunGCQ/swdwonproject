<?php
	$sn_id = $_POST["sn_id"];

	include("conn/conn.php");
	$query = mysql_query("delete from s_number where sn_id = '".$sn_id."'");
	if(!$query) echo "error";
	else echo "success";
?>