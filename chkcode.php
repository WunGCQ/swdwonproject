<?php
	session_start(); 
 
	$code = trim($_POST['vcode']); 
	if($code==$_SESSION["code"]){ 
   		echo '1'; 
	} 
?>