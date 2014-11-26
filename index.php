<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="思唯特" content="一个在线的软件商店">
    <title>思唯特在线商店——软件商店</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/index.js"></script>
    <script src="js/cookie.min.js"></script>
    <!--<link href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="css/header.css"/>
    <link rel="stylesheet" type="text/css" href="css/index.css"/>
    <link rel="stylesheet" type="text/css" href="css/footer.css"/>
    <link rel="stylesheet" type="text/css" href="css/model-window.css"/>
</head>
<body>
    <?php include("header.php"); ?>
	<div id="container">
		<div id="nav">
			<div class="nav-div active" onclick="setActiveBlock('cw-1',this);">
                首页
            </div>
			<div class="nav-div"  onmouseover="showListMenu('windows-menu')" onmouseout="hideListMenu('windows-menu')" onclick="setActiveBlock('cw-2',this);">
                Windows平台
                <!-- <ul class="list-menu" id="windows-menu"  >
                    <li><a href="">选项一</a></li>
                    <li><a href="">选项afa</a></li>
                    <li><a href="">选fow3e</a></li>
                </ul> -->
            </div>
            <div class="nav-div"  onmouseover="showListMenu('Mac-menu')" onmouseout="hideListMenu('Mac-menu')" onclick="setActiveBlock('cw-3',this);">
                Mac平台
              <!--   <ul class="list-menu" id="Mac-menu"  >
                    <li><a href="">选项一</a></li>
                    <li><a href="">选项afa</a></li>
                    <li><a href="">选fow3e</a></li>
                </ul> -->
            </div>
            <div class="nav-div"   onmouseover="showListMenu('IOS-menu')" onmouseout="hideListMenu('IOS-menu')" onclick="setActiveBlock('cw-4',this);">
                iOS平台
                <!-- <ul class="list-menu" id="IOS-menu">
                    <li><a href="">选项一</a></li>
                    <li><a href="">选项afa</a></li>
                    <li><a href="">选fow3e</a></li>
                </ul> -->
            </div>
            <div class="nav-div"   onmouseover="showListMenu('e-menu')" onmouseout="hideListMenu('e-menu')" onclick="setActiveBlock('cw-5',this);">
                数码周边
               <!--  <ul class="list-menu" id="e-menu">
                    <li><a href="">选项一</a></li>
                    <li><a href="">选项afa</a></li>
                    <li><a href="">选fow3e</a></li>
                </ul> -->
            </div>
            <div class="nav-div"   onmouseover="showListMenu('books-menu')" onmouseout="hideListMenu('books-menu')" onclick="setActiveBlock('cw-6',this);">
                图书文献
               <!--  <ul class="list-menu" id="books-menu">
                    <li><a href="">选项一</a></li>
                    <li><a href="">选项afa</a></li>
                    <li><a href="">选fow3e</a></li>
                </ul> -->
            </div>
        </div>


        <div class="commodities-wrap" id="cw-1">
            <?php include("showprod.php"); ?>
        </div>
        <div class="commodities-wrap" id="cw-2">
            <?php include("showprod1.php"); ?>
        </div>
        <div class="commodities-wrap" id="cw-3">
            <?php include("showprod2.php"); ?>
        </div>
        <div class="commodities-wrap" id="cw-4">
            <?php include("showprod3.php"); ?>
        </div>
        <div class="commodities-wrap" id="cw-5">
            <?php include("showprod4.php"); ?>
        </div>
        <div class="commodities-wrap" id="cw-6">
            <?php include("showprod5.php"); ?>
        </div>
	</div>
	<?php include("footer.php") ?>
</body>
<div class="model-window" id="login">
	<div class="window-main" id="login-window">
		<span style="position:relative;float: right;font-size: 30px;cursor: pointer;" onclick="$('#login').hide()">×</span>
		<form action="" method="post">
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
				<a href="#" target="_blank">前去注册~</a>
			</div>
			<div class="form-group">
				<button class="btn" type="button" value="login">登录</button>
			</div>
		</form>
	</div>
</div>
<div class="model-window" id="regist" style="">
	<div class="window-main" id="regist-window">
		<span class="close" onclick="$('#regist').hide()">×</span>
		<form action="" method="post">
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
				<input type="email" placeholder="请输入email" name="email" class="form-control" required="required" pattern=" /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.(?:com|cn)$/"/>				
			</div>
			<div class="form-group">
				<button class="btn" type="button" value="login" required="">注册并登录</button>
			</div>
		</form>
	</div>
</div>
<script>
    function showListMenu(name){
        var ListMenu=document.getElementById(name);
        $(ListMenu).show();
//        ListMenu.style.display="block";
    }
    function hideListMenu(name){
        var ListMenu=document.getElementById(name);
        $(ListMenu).hide();
//        ListMenu.style.display="none";
    }
    function setActiveBlock(name,Obj){
        $('.nav-div').attr("class","nav-div");
        $(Obj).attr("class","nav-div active");
        $('.commodities-wrap').hide();
        $('#'+name).show();
    }
    $('#cw-1').show();
</script>
</html>