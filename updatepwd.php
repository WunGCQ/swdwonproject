<?php

	$msg = "";
	$status = 0;	

	session_start();
	$u_name = $_SESSION["u_name"];
	$u_password = trim($_POST['password']);
	unset($_SESSION['u_name']);

	include("conn/conn.php");
	$query = mysql_query("update user set u_password = '".md5($u_password)."' where u_name = '".$u_name."'");
	if(!$query) $msg = "更新失败";
	else
	{
		$msg = "重置密码成功，请重新登录";
		header("Location: index.php");
	}
?>