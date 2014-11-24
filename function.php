<?php
	
	function prodorderId()
	{
		date_default_timezone_set('Etc/GMT-8');
		return date("Ymdhis").rand(1000,9999);
	}

	function sendEmails($to,$subject,$body,$semail,$semail_password)
	{ 
		require("./phpmailer/class.phpmailer.php");//调用   
		$mail = new PHPMailer();//实例化phpmailer   
		$address = $to;//接收邮件的邮箱   
		$mail->IsSMTP(); // 设置发送邮件的协议：SMTP   
		$mail->Host = "smtp.163.com"; // 发送邮件的服务器   
		$mail->SMTPAuth = true; // 打开SMTP   
		$mail->Username = trim($semail); // SMTP账户   
		$mail->Password = trim($semail_password); // SMTP密码   
		$mail->From = trim($semail);
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

	function UploadImage($filepath)
	{
	    $type = $_FILES[$filepath]['type'];
		if($type=='image/jpg'|| $type=='image/jpeg'||$type=='image/pjpeg')
		{
			$ext = substr($_FILES[$filepath]['name'],strpos($_FILES[$filepath]['name'],'.'));
			date_default_timezone_set('Etc/GMT-8');
  			$photo=date("Ymdhis").rand(100,999).$ext;
  			$ans = move_uploaded_file( $_FILES[$filepath]['tmp_name'] , 'img/'.$photo );
  			if($ans) return 'img/'.$photo;
  			else return -1;
		}
		return -2;
	}

	function DeleteImage($imagepath)
	{
		unlink("img/".$imagepath);
	}
?>