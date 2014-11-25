<?php
	header("Content-type:text/html; charset=utf-8");
	include_once("conn/conn.php");//连接数据库 
 	$status = 0;
 	$msg = "";	

	$token = stripslashes(trim($_GET['token'])); 
	$u_name = stripslashes(trim($_GET['username']));

	$query = mysql_query("select * from user where u_name = '".$u_name."'"); 
	$row = mysql_fetch_array($query); 
	if($row){ 
    	$mt = md5($row['u_id'].$row['u_password'].$row['u_name']); 
    	if($mt == $token){ 
        	if($row['u_exptime'] < time()){ 
            	$msg = '该链接已过期,请重新发送找回密码链接'; 
        	}else{ 
            	//重置密码... 
            	$msg = '请重新设置密码，显示重置密码表单，<br/>这里只是演示，略过。';
                session_start();
                $_SESSION["u_name"]=$u_name;
            	header("Location: resetpwd.php");
            	exit;
        	} 
    	}else{ 
        	$msg =  '无效的链接'; 
    	} 
	}else{ 
    	$msg =  '错误的链接！';     
	}
	echo $msg; 
?>