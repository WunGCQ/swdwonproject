<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="思维特" content="一个在线的软件商店">
    <title>思维特在线商店——软件商店</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/index.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/header.css"/>
    <link rel="stylesheet" type="text/css" href="css/index.css"/>
    <link rel="stylesheet" type="text/css" href="css/footer.css"/>
    <link rel="stylesheet" type="text/css" href="css/model-window.css"/>
</head>
<body>
    <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1115011626&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:1115011626:51" alt="欢迎咨询" title="欢迎咨询"/></a>
	<?php include("header.php"); ?>
	<div id="container">
		<ul id="nav">
			<li><a href="#">首页</a></li>
			<li><a href="#">Apple商品</a></li>
			<li><a href="#">Adobe商品</a></li>
            <li><a href="#">使用说明</a></li>
            <li><a href="#">关于我们</a></li>
			<li></li>
		</ul>
        <div id="commodities-wrap">
            <?php include("showprod.php"); ?>
        </div>
	</div>
	<?php include("footer.php") ?>
</body>
</html>