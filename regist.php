<?php
    $_flag = trim($_GET["flag"]);
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="名称" content="思维客">
    <meta name="思维客 简介" content="简介">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <title>思维特：注册</title>
    <script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/regist.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/warning.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="css/warning.css"/>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/regist.css"/>
    <style>
        .btn{
            border-radius: 1px;
        }
    </style>
</head>
<body onload="stepOne()">
    <div class="container">
        <div class="row">
            <div  id="header" class="col-xs-10 col-xs-offset-1">
            <h1>思维特</h1>
            <h2>用户注册</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1" id="steps-reminder">
                <div class="step-hr step-hr-active"></div>
                <div class="step step-active">1</div>
                <div class="step-hr"></div>
                <div class="step">2</div>
                <div class="step-hr"></div>
                <div class="step">√</div>
                <div class="step-hr"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1" id="steps">
                <div style="margin-left: 140px;" class="steps-active">设置账户信息</div>
                <div style="margin-left: 120px;">验证账户信息</div>
                <div style="margin-left: 140px;">注册成功</div>
            </div>
        </div>
    <div class="row" style="margin-bottom: 20px;">
        <div id="regist-info-wrap" class="col-xs-10 col-xs-offset-1">
            <div id="step1">
                <div class="col-xs-8">
                    <form id="reg" action="regchk.php" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="input-Email" class="col-xs-3 col-xs-offset-1 control-label">用户名</label>
                            <div class="col-xs-7">
                                <input id="username" type="text" class="form-control" id="input-username" placeholder="输入您的用户名" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-1">
                                <span class="fa fa-envelope-o"></span>
                            </div>
                            <label for="input-Email" class="col-xs-3 control-label">电子邮箱</label>
                            <div class="col-xs-7">
                                <input id="useremail" type="email" class="form-control" id="input-Email" placeholder="输入电子邮箱作为账户名" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-Password" class="col-xs-3 col-xs-offset-1 control-label">登录密码</label>
                            <div class="col-xs-7">
                                <input id="password" type="password" class="form-control" id="input-Password" placeholder="输入您的登录密码">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-8 col-xs-offset-4" id="check-password-safety">
                                <div class="col-xs-3">弱</div>
                                <div class="col-xs-3">中</div>
                                <div class="col-xs-3">强</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-Password-again" class="col-xs-3 col-xs-offset-1  control-label">确认登录密码</label>
                            <div class="col-xs-7">
                                <input id="password-again" type="password" class="form-control" id="input-Password-again" placeholder="输入您的登录密码">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-1">
                                <span class="fa fa-mobile"></span>
                            </div>
                            <label for="input-Email" class="col-xs-3 control-label">手机号码</label>
                            <div class="col-xs-7">
                                <input id="telephone" type="email" class="form-control" id="input-Email" placeholder="输入您的手机号码" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="input-Email" class="col-xs-3 col-xs-offset-1 control-label">图片验证码</label>
                            <div class="col-xs-3">
                                <input id="vcode" type="email" class="form-control" id="input-Email" placeholder="" required="required">
                            </div>
                            <div class="col-xs-4">
                                <img id="vimage" src="code_num.php" alt="验证码" onclick="vcode_onclick()"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-offset-4 col-xs-10">
                                <button type="button" class="btn btn-theme" onclick="checkinfo();">同意协议并注册</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-offset-4 col-xs-10">
                                <a href="" target="_blank">《思维客 服务协议》</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xs-4" style="border-left:1px solid #ddd;margin-top: 80px;padding: 15px 30px;">
                    <p>思维客是国内然就大数据应用的领导企业，公司依托数年数据挖掘、数据处理以及互联网研发技术等经验，以互联网数据精准数据分析技术为核心驱动，通过整合媒体资源、分析互联网受众浏览访问行为，帮助客户从大数据角度获取更多的营销价值。</p>
                </div>
            </div>
            <div id="step2">
                <div class="row">
                    <div class="col-xs-offset-1 col-xs-10" style="text-align:left;padding:15px;">
                        <p id="succcess-info">
                            <span class="fa fa-check"></span>
                            邮件已发送到邮箱 <span id="target-email-address" style="font-weight: bold;"></span>，请在24小时内点击邮件中的链接继续完成注册。
                        </p>
                    </div>
                    <div class="col-xs-offset-1 col-xs-10" style="text-align:left;padding:0px 0px 30px 50px;border-bottom: 1px solid #ddd;">
                        <button type="button" class="btn btn-theme" onclick="locaemail()">立即查收邮件</button>
                    </div>
                    <div class="col-xs-offset-1 col-xs-10" style="text-align:left;padding:15px;">

                        <ul id="regist-question-list">
                            <strong style="font-size: larger;">一直没有收到邮件？</strong>
                            <li>请先检查是否在垃圾邮件中</li>
                            <li>如果还未收到请 <button type="button" class="btn btn-info btn-xs" onclick="stepThree()">重新发送邮件</button> </li>
                            <li>重新发送邮件，还未收到？请试试 <a href="#">更换其他邮箱</a> </li>
                            <li>一直没收到？您可以<a href="#">重新注册</a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <div id="step3">
                <div class="row">
                    <div class="col-xs-offset-1 col-xs-10" style="text-align: center;padding: 85px 15px 120px 15px;color: #28a4c9;">
                        赶紧来看一看你感兴趣的软件吧！
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<script>

    function stepOne(){
        $("#step2").hide();
        $("#step3").hide();
    }

    function stepTwo() {

        var email = $("#useremail").val();
        $("#target-email-address").text(email);
        
        $("#step1").hide();
        $("#step2").show();
        $("#step3").hide();
        $(".step-hr:eq(1)").attr("class","step-hr step-hr-active");
        $(".step:eq(1)").attr("class","step step-active");
        $("#steps>div:eq(1)").attr("class","steps-active");

    }
    function stepThree() {
        $("#step1").hide();
        $("#step2").hide();
        $("#step3").show();
        $(".step-hr:eq(2)").attr("class","step-hr step-hr-active");
        $(".step-hr:eq(3)").attr("class","step-hr step-hr-active");
        $(".step:eq(2)").attr("class","step step-active");
        $("#steps>div:eq(2)").attr("class","steps-active");

    }
//    stepTwo();
//    stepThree();
</script>
<?php  
    if($flag == 1)
    {
        echo "<script type='text/javascript'>stepThree();</script>";
    }
?>
</html>