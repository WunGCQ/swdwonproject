<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <meta name="思维特" content="一个在线的软件商店">
    <title>思维特在线商店——软件商店</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/index.js"></script>
    <link rel="stylesheet" type="text/css" href="css/header.css"/>
    <link rel="stylesheet" type="text/css" href="css/index.css"/>
    <link rel="stylesheet" type="text/css" href="css/model-window.css"/>
</head>
<body>
	<div id="header">
		<div id="logo-div">
			<p>
				思维特
				<br />
				www.swdown.com
			</p>
		</div>
		<div id="nav">
			<span><a href="" target="_blank">Apple 商品</a></span>
			<span><a href="" target="_blank">Adobe 商品</a></span>
			<span><a id=username>用户名</a></span>
			<span><a href="">登录</a></span>
			<span><a href="">注册</a></span>
		</div>
	</div>
	<div id="container">
		
	</div>
	<div id="footer">
		
	</div>
</body>
<div class="model-window" id="login">
	<div class="window-main" id="login-window">
		<span style="position:relative;float: right;font-size: 30px;cursor: pointer;" onclick="$('#login').hide()">×</span>
		<form action="logchk.php" method="post">
			<div class="form-group">
				<!--<label for="username">用户名</label>-->					
				<input type="text" placeholder="请输入用户名" name="username" class="form-control"/>
				
			</div>
			<div class="form-group">
				<!--<label for="password">密码</label>	-->				
				<input type="password" placeholder="请输入用户密码" name="password" class="form-control"/>
				
			</div>
			<div class="form-group">
				<a href="#" target="_blank">忘记密码？</a>
				&nbsp;
				<a href="#" target="_blank">没有账户？前去注册</a>
			</div>
			<div class="form-group">
				<button class="btn" type="submit" value="login">登录</button>
			</div>
		</form>
	</div>
</div>
<div class="model-window" id="regist" style="">
	<div class="window-main" id="regist-window">
		<span style="position:relative;float: right;font-size: 30px;cursor: pointer;" onclick="$('#regist').hide()">×</span>
		<form action="regchk.php" method="post">
			<div class="form-group">
				<!--<label for="username">用户名</label>-->					
				<input type="text" placeholder="请输入用户名" name="username" class="form-control" required="required"/>
				
			</div>
			<div class="form-group">
				<!--<label for="password">密码</label>	-->				
				<input type="password" placeholder="请输入用户密码" name="password" class="form-control" required="required"/>
				
			</div>
			
			<div class="form-group">
				<!--<label for="password">密码</label>	-->				
				<input type="password" placeholder="请确认用户密码" name="password-again" class="form-control" required="required"/>				
			</div>
			<div class="form-group">
				<!--<label for="password">密码</label>	-->				
				<input type="tel" placeholder="请输入手机号" name="phonenumber" class="form-control" required="required"/>
				
			</div>
			<div class="form-group">			
				<input type="email" placeholder="请输入email" name="email" class="form-control" required="required" pattern="^\w+[-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$"/>				
			</div>
			<div class="form-group">
				<button class="btn" type="submit" value="login" required="">注册并登录</button>
			</div>
		</form>
	</div>
</div>
</html>