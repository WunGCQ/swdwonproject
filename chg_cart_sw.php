<?php
	
	$s_id = $_POST["s_id"];
	$amount = $_POST["s_amount"];

	session_start();
	$cart = $_SESSION["cart"];
	$cart[$s_id] = $amount;

	$_SESSION["cart"] = $cart;
	echo "success";
?>