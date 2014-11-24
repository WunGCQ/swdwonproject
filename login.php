<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="名称" content="思维特">
    <meta name="思维特 登录" content="登录">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>思维特:用户登录</title>
    <script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/warning.js" type="text/javascript" charset="utf-8"></script>
    <!--<link href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>-->
    <link rel="stylesheet" href="font-awesome-4.2.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/warning.css"/>
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
</head>
<body>
    <div id="container">
        <div class="row" style="text-align: center;margin-top: 50px;font-family:'微软雅黑','Microsoft Yahei',Arial,Helvetica,sans-serif,'宋体';">
            <h1>思维特 用户登录</h1>
        </div>
        <div class="row" >
            <div class="col-sm-10 col-sm-offset-1" id="login-wrap" style="margin-top: 10px;">
                <form action="logchk.php" method="post">
                    <div class="row">
                        <div class="col-sm-1 col-sm-offset-3" id="username-icon">
                            <span class="fa fa-user" style="color: #fff;font-size: 20px;"></span>
                        </div>
                        <div class="col-sm-5" id="username-input-wrap">
                            <input type="text" name="username" id="username-input" required="" placeholder="请输入用户名"/>
                        </div>

                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-1 col-sm-offset-3" id="password-icon">
                            <span class="fa fa-lock" style="color: #fff;font-size: 20px;"></span>
                        </div>
                        <div class="col-sm-5" id="password-input-wrap">
                            <input type="password" name="password" id="password-input" required="" placeholder="请输入密码"/>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">

                        <div class="col-sm-2 col-sm-offset-5" style="text-align: center;">
                            <a href="">忘记密码？</a>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">

                        <div class="col-sm-4 col-sm-offset-4">
                            <button class="btn" type="submit" value="login" style="background-color: #428bca;color: #fff;border-radius: 1px;width: 100%;height: 45px;line-height: 30px;font-size: 16px;">登录</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
</html>