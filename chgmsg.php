<?php
	
	header("Content-type:text/html; charset=utf-8");
	session_start();
	include("conn/conn.php");

	$u_telephone = $_POST["phonenumber"];
	$u_email = $_POST["email"];

	$sql = "update user set ";
	if($u_telephone != "")
		$sql = $sql."u_telephone = '".$u_telephone."' ";
	if($u_email != "")
		$sql = $sql.",u_email = '".$u_email."' ";
	$sql = $sql."where u_id = ".$_SESSION["u_id"];

	$update = mysql_query($sql,$conn);
	if(!$update)
	{
		echo "<script language='javascript'>alert('更新信息失败');history.back();</script>";
	}
	else
	{
		echo "<script language='javascript'>alert('更新成功');history.back()</script>";
	}
?>