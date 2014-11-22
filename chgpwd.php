<?php
	
	header("Content-type:text/html; charset=utf-8");
	session_start();
	include("conn/conn.php");

	$u_oldpwd = $_POST["old_password"];
	$u_newpwd = $_POST["new_password"];
	$msg = "";

	$ans = mysql_query("select u_password from user where u_id = ".$_SESSION["u_id"],$conn);
	$info = mysql_fetch_array($ans);

	if(!$info)
	{
		$msg = "database select error";
	}
	else
	{
		if($info["u_password"] != md5($u_oldpwd))
			$msg = "password error";
		else
		{
			$sql = "update user set u_password = '".md5($u_newpwd)."'";

			$update = mysql_query($sql,$conn);
			if(!$update)
				$msg = "database update error";
			else
				$msg = "success";
		}
	}
	echo $msg;
?>