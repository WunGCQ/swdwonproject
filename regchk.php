<?php
	header("Content-type:text/html; charset=utf-8");
	
	function checkInput()
	{
		$u_name = $_POST['username'];
		$u_password = $_POST['password'];
		$u_telephone = $_POST['phonenumber'];
		$u_email = $_POST['email'];

		include("conn/conn.php");

		$sql = mysql_query("select u_id from user where u_name = '".$u_name."'",$conn);
		$info = mysql_fetch_array($sql);

		if($info == false)
		{
			$sql = "insert into user(u_name,u_password,u_email,u_telephone,u_isadmin) values('".$u_name."','".$u_password."','".$u_email."','".$u_telephone."',0)";
			$insert =mysql_query($sql,$conn);

			if($insert == 0)
				echo "<script language='javascript'>alert('数据库插入异常');history.back();</script>";
			else
				echo "<script language='javascript'>alert('注册成功');</script>";
		}
		else
		{
			echo "<script language='javascript'>alert('用户名已经存在！');history.back();</script>";
		}
	}
	checkInput();
?>