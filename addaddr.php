<?php

	include("conn/conn.php");

	$u_id = $_POST["u_id"];
	$a_name = $_POST["a_name"];
	$a_telephone = $_POST["a_telephone"];
	$a_address = $_POST["a_address"];

	$query = mysql_query("insert into address(u_id,a_name,a_address,a_telephone) values('".$u_id."','".$a_name."','".$a_address."','".$a_telephone."')",$conn);
	if(!$query) echo "error";
	else echo mysql_insert_id($conn);
?>