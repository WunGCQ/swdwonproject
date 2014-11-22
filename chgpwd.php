<?php
	
	header("Content-type:text/html; charset=utf-8");
	session_start();
	include("conn/conn.php");

	$u_oldpwd = $_POST["old-password"];
	$u_newpwd = $_POST["new-password"];

	$ans = mysql_query("select u_password from user where u_id = ".$_SESSION["u_id"],$conn);
	$info = mysql_fetch_array($ans);

	if(!$info)
	{
		echo "<script language='javascript'>alert('数据库查询异常，请稍后再试');history.back();</script>"; 
	}
	if($info["u_password"] != md5($u_oldpwd))
	{
		echo "<script language='javascript'>alert('原始密码错误！');history.back();</script>"; 
	}
	else
	{
		$sql = "update user set u_password = '".md5($u_newpwd)."'";

		$update = mysql_query($sql,$conn);
		if(!$update)
		{
			echo "<script language='javascript'>alert('数据库插入异常，请稍后再试');history.back();</script>";
		}
		else
		{
			echo "<script language='javascript'>alert('修改密码成功');history.back()</script>";
		}
	}
?>