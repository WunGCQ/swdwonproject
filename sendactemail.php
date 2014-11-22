<?php
	
	

	$to = $u_email;
	$subject = "用户账号激活邮件";
	$body = "亲爱的".$u_name."：<br/>感谢您在我站注册了新帐号。<br/>请点击链接激活您的帐号。<br/> 
    <a href='localhost/swdwonproject/active.php?verify=".$u_token."' target= 
'_blank'>localhost/swdwonproject/active.php?verify=".$u_token."</a><br/> 
    如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。";
?>