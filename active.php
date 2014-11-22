<?php
	include_once("conn/conn.php");//连接数据库 
 
	$verify = stripslashes(trim($_GET['verify'])); 
	$nowtime = time();

	$query = mysql_query("select u_id,u_exptime from user where u_status='0' and u_token='".$verify."'",$conn); 
	$row = mysql_fetch_array($query); 
	if($row){ 
    	if($nowtime>$row['u_exptime']){ //24hour 
        	$msg = '您的激活有效期已过，请登录您的帐号重新发送激活邮件.'; 
    	}else{ 
        	$info = mysql_query("update user set u_status=1 where u_id=".$row['u_id'],$conn);
        	if(!$info)  $msg = "激活失败";
        	else $msg = '激活成功！';
        	 
   		} 
	}
	else{ 
    	$msg = 'error.';     
	} 
echo $msg;
?>