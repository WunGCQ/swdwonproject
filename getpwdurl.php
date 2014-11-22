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
    <?php include("header.php"); ?>、
    <form action="resetchk.php" method="post">
        <p><strong>输入您注册的电子邮箱和用户名，找回密码：</strong></p> 
        <p><input type="text" class="input" name="username" id="username"><span id="chkmsg"></span></p>
        <p><input type="text" class="input" name="email" id="email"><span id="chkmsg"></span></p> 
        <p><button type="submit" class="btn" id="sub_btn" value="submit">提交</button></p> 
    </form>

</body>