<?php
	header("Content-type:text/html; charset=utf-8");
	
	function checkInput()
	{
		$u_name = $_POST['username'];
		$u_password = $_POST['password'];

		include("conn/conn.php");
		$sql = mysql_query("select * from user where u_name = '".$u_name."' and u_password = '".$u_password."'",$conn);
		$info = mysql_fetch_array($sql);

		if($info)
		{
			echo "<script language='javascript'>alert('登录成功');history.back();</script>";
		}
		else
		{
			echo "<script language='javascript'>alert('用户名或密码错误');history.back();</script>";
		}
	}
	checkInput();
?>