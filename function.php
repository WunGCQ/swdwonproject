<?php
	
	function prodorderId()
	{
		date_default_timezone_set('Etc/GMT-8');
		return date("Ymdhis").rand(1000,9999);
	}

	function sendEmails($to,$subject,$body)
	{ 
		require("./phpmailer/class.phpmailer.php");//调用   
		$mail = new PHPMailer();//实例化phpmailer   
		$address = $to;//接收邮件的邮箱   
		$mail->IsSMTP(); // 设置发送邮件的协议：SMTP   
		$mail->Host = "smtp.163.com"; // 发送邮件的服务器   
		$mail->SMTPAuth = true; // 打开SMTP   
		$mail->Username = "buaaxiaomi@163.com"; // SMTP账户   
		$mail->Password = "w23x24p16xiaomi"; // SMTP密码   
		$mail->From = "buaaxiaomi@163.com";   
		$mail->FromName = "思维特软件商店";   
		$mail->AddAddress("$address", "");   
		//$mail->AddAddress(""); // name is optional   
		//$mail->AddReplyTo("", "");   
		//$mail->WordWrap = 50; // set word wrap to 50 characters   
		//$mail->AddAttachment("/var/tmp/file.tar.gz"); // add attachments   
		//$mail->AddAttachment("/tmp/image.jpg", "new.jpg"); // optional name   
		//$mail->IsHTML(true); // set email format to HTML   
		$mail->CharSet = "UTF-8";//设置字符集编码   
		$mail->Subject = $subject;   
		$mail->Body = $body;//邮件内容（可以是HTML邮件）   
		$mail->AltBody = "This is the body in plain text for non-HTML mail clients";   
		if(!$mail->Send())   
		{   
			echo "Message could not be sent. < p>";   
			echo "Mailer Error: " . $mail->ErrorInfo;   
			return 0;   
		}   
		return 1;//发送成功显示的信息     
	}

	function getaddress($u_id)
	{
		$ans = mysql_query("select * from address where u_id = '".$u_id);
	}
?>