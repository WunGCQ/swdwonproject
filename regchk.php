<?php
	header("Content-type:text/html; charset=utf-8");
	
	function checkInput()
	{
		$msg = "";

		include("conn/conn.php");
		include("function.php");
		$u_name = trim($_POST['username']);

		$sql = mysql_query("select u_id from user where u_name = '".$u_name."'",$conn);
		$info = mysql_fetch_array($sql);
		if($info)
		{
			echo "用户名已经存在!";
			return;
		}

		$u_password = md5(trim($_POST['password']));
		$u_telephone = trim($_POST['telephone']);
		$u_email = trim($_POST['email']);
		$u_token = md5($u_name.$u_password.time());
		$u_exptime = time()+60*60*24;

		/*echo $u_name.",".$u_password.",".$u_email.",".$u_telephone;
		return;*/

		$sql = "insert into user(u_name,u_password,u_email,u_telephone,u_isadmin,u_token,u_exptime,u_status) values('".$u_name."','".$u_password."','".$u_email."','".$u_telephone."',0,'".$u_token."','".$u_exptime."',0)";
		$insert =mysql_query($sql,$conn);
		if($insert == 0){
			echo "数据库异常";
			return;
		}

		include("readconfig.php");
		$to = $u_email;
		$subject = "用户账号激活邮件";
		$body = "亲爱的".$u_name."：<br/>感谢您在我站注册了新帐号。<br/>请点击链接激活您的帐号。<br/> 
    <a href='".$domain."active.php?verify=".$u_token."' target= 
'_blank'>".$domain."active.php?verify=".$u_token."</a><br/> 
    如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。";

    	sendEmails($mail,$to,$subject,$body,$semail,$semail_password);

    	echo "success";
	}
	checkInput();
?>