<?php
	header("Content-type:text/html; charset=utf-8");
	
	session_start();

	function checkInput()
	{
		$u_name = $_POST['username'];
		$u_password = md5($_POST['password']);

		include("conn/conn.php");
		$sql = mysql_query("select * from user where u_name = '".$u_name."' and u_password = '".$u_password."'",$conn);
		$info = mysql_fetch_array($sql);

		if(!$info)
		{
			echo "<script language='javascript'>alert('用户名或密码错误');history.back();</script>";
			return;
		}
		else
		{
			$_SESSION["u_id"] = $info['u_id'];
    	    $_SESSION["u_name"] = $info['u_name'];
            echo "<script>alert('管理员登录成功!');window.location='index.php';</script>";
        }
	}
	checkInput();
?>