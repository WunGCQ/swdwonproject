<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="名称" content="特准客">
    <meta name="特准客 简介" content="简介">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>思维特:用户登录</title>
    <script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/warning.js" type="text/javascript" charset="utf-8"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/warning.css"/>
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1" style="text-align: center;padding: 150px 0px 50px 0px;border-bottom: 1px solid #ccc;">
                <h1 style="color: #285e8e;letter-spacing: 4px; font-size: 40px;margin: auto;">思维特</h1>
            </div>
        </div>
        <div class="row" >
            <div class="col-sm-10 col-sm-offset-1" id="login-wrap" style="border-bottom: 1px solid #ccc;">
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
                        <div class="col-sm-2 col-sm-offset-3" >
                            <a class="btn" href="regist.php" style="background-color: #285e8e;color: #fff;border-radius: 1px;width: 100%;height: 45px;line-height: 30px;font-size: 16px;">用户注册</a>
                        </div>
                        <div class="col-sm-2">
                            <button class="btn" type="submit" value="login" style="background-color: #285e8e;color: #fff;border-radius: 1px;width: 100%;height: 45px;line-height: 30px;font-size: 16px;">登录</button>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn" href="getpwdurl.php" style="background-color: #285e8e;color: #fff;border-radius: 1px;width: 100%;height: 45px;line-height: 30px;font-size: 16px;">找回密码</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
</html>