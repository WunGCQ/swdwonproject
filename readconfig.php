<?php
	$file = fopen("files/config.txt", "r") or die("Unable to open file!");
    $domain = trim(fgets($file));
    $remail = fgets($file);
    $semail = fgets($file);
    $semail_password = fgets($file);
    fclose($file);

    require("./phpmailer/class.phpmailer.php");//调用
	$mail = new PHPMailer();
?>