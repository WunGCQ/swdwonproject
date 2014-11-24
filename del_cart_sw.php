<?php
	
	$s_id = $_POST["s_id"];

	session_start();
	$cart = $_SESSION["cart"];
	unset($cart[$s_id]);

	$_SESSION["cart"] = $cart;
	echo "success";
?>