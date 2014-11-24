<?php
	
	include("conn/conn.php");
	$query = mysql_query("insert into s_number(sn_number,s_id) values('".$_POST["sn_number"]."','".$_POST['s_id']."')",$conn);
	if(!$query) echo "error";
	else echo mysql_insert_id();
?>