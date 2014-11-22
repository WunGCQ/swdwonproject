<?php
	
	include("conn/conn.php");
	$a_id = $_POST["a_id"];
	$a_name = $_POST["a_name"];
	$a_address = $_POST["a_address"];
	$a_telephone = $_POST["a_telephone"];

	$query = mysql_query("update address set a_name = '".$a_name."',a_address = '".$a_address."', a_telephone = '".$a_telephone."' where a_id = '".$a_id."'",$conn);
	if(!$query) echo "error";
	else echo "success";
?>