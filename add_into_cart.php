<?php
	
	$s_id = trim($_POST["s_id"]);
	$amount = trim($_POST["amount"]);
	
	if($s_id == "" || $amount == "")
	{
		echo "error";
		exit;
	}

	session_start();
	if($_SESSION["cart"]) $cart = $_SESSION["cart"];
	else $cart = array();

	if($cart[$s_id])  $cart[$s_id] += $amount;
	else   $cart[$s_id] = $amount;
	
	$_SESSION["cart"] = $cart;

	echo "success";
?>