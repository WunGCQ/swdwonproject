<?php
	
	$u_id = $_POST["u_id"];
	$u_name = $_POST["u_name"];
	$u_password = $_POST["u_password"];
	$u_email = $_POST["u_email"];
	$u_token = md5(time().$u_name.$u_password);
	$u_exptime = time()+24*60*60;

	include("conn/conn.php");
	$query = mysql_query("update user set u_token = '".$u_token."', u_exptime = '".$u_exptime."' where u_id = '".$u_id."'",$conn);
	if(!$query){
		echo "数据库更新错误";
		exit;
	}

	include("function.php");
	include("readconfig.php");
	$to = $u_email;
	$subject = "用户账号激活邮件";
	$body = "亲爱的".$u_name."：<br/>感谢您在我站注册了新帐号。<br/>请点击链接激活您的帐号。<br/> 
    <a href='".$domain."active.php?verify=".$u_token."' target= 
'_blank'>".$domain."active.php?verify=".$u_token."</a><br/> 
    如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。";

    if(sendEmails($to,$subject,$body,$semail,$semail_password))
    	echo "success";
    else echo "发送邮件错误";
?>