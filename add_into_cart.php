<?php
	
	$s_id = trim($_POST["softw_id"]);
	$amount = trim($_POST["amount"]);
	echo $s_id."   ".$amount;

	session_start();
	if($_SESSION["cart"]) $cart = $_SESSION["cart"];
	else $cart = array();

	if($cart[$s_id])  $cart[$s_id] += $amount;
	else   $cart[$s_id] = $amount;
	
	$_SESSION["cart"] = $cart;

	echo "success";
?>