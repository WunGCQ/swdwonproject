<?php
	
	header("Content-type:text/html; charset=utf-8");
	function checkinfo()
	{
		include("conn/conn.php");

		$u_name = trim($_POST["username"]);
		$u_email = trim($_POST["email"]);
		$msg = "";

		$ans = mysql_query("select * from user where u_name = '".$u_name."'",$conn);
		if(!$ans)
		{
			$msg = "该用户名没有注册";
			return $msg;	
		} 
		$ans = mysql_query("select * from user where u_email = '".$u_name."'",$conn);
		if(!$ans)
		{
			$msg = "该邮箱尚未注册";
			return $msg;
		}

		$ans = mysql_query("select * from user where u_name = '".$u_name."' and u_email = '".$u_email."'",$conn);
		$info = mysql_fetch_array($ans);
		if(!$info)
		{
			$msg = "用户名与邮箱不匹配";
			return $msg;
		}

		if($info["u_status"] == 0)
		{
			$msg = "邮箱尚未激活，无法发送重置密码链接";
			return $msg;
		}

		include("readconfig.php");
		$to = $u_email;
		$subject = "思维特官方商店——重置密码链接";
		$token = md5($info["u_id"].$info["u_password"].$info["u_name"]);
		$time = time('Y-m-d H:i');
		$exptime = time()+60*60*24;
		$url = $domain."reset.php?username=".$info["u_name"]."&token=".$token;//构造URL 
		$body = "亲爱的".$info["u_name"]."：<br/>您在".time()."提交了找回密码请求。请点击下面的链接重置密码 
（按钮24小时内有效）。<br/><a href='".$url."'target='_blank'>".$url."</a>"; 
		
		include("function.php");
		if(sendEmails($mail,$to,$subject,$body,$semail,$semail_password))
		{	
			$msg = "邮件发送成功";
			$ans = mysql_query("update user set u_exptime = '".$exptime."'",$conn);
			if(!$ans)  $msg = "数据库更新异常";
		}
		else $msg = "邮件发送失败";

		return $msg;
	}

	$msg = checkinfo();
	echo "<script language='javascript'>alert('".$msg."');</script>";
?>