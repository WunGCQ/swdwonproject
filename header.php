<div id="header">
	<div id="header-container">
		<div id="logo-div">
			思维特LOGO
		</div>
		<div id="header-user-block">
			<?php
				error_reporting(0);
				session_start();
				if($_SESSION["u_id"])
				{
					$u_name = $_SESSION["u_name"];
					echo "<span><a id='username' href='usercenter.php'>".$u_name."</a></span>";
				}
				echo "<span><a id='shopping-cart'>购物车</a></span>";
				if($_SESSION["u_name"])
				{
					echo "<span><a href='logout.php'>注销</a></span>";
				}
				else
				{
			        echo "<span><a href=\"login.php\" id=\"show-login\">登录</a></span>|";
			        echo "<span><a href=\"regist.php\" id=\"show-regist\">注册</a></span>";
				}
			?>
		</div>
	</div>
</div>