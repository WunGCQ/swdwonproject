<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="思维特" content="一个在线的软件商店">
    <title>思维特在线商店——软件商店</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/index.js"></script>
    <!--<link href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="css/header.css"/>
    <link rel="stylesheet" type="text/css" href="css/index.css"/>
    <link rel="stylesheet" type="text/css" href="css/footer.css"/>
    <link rel="stylesheet" type="text/css" href="css/model-window.css"/>
    <style>
        .form-group>*{
            display: inline-block;
            text-align: left;
        }
        .form-group label{
            text-align: left;
            width: 90px;
            padding: 5px;
            margin: 0px 10px;
        }
        .form-group{
            text-align: center;
            padding:5px;
        }
        .form-group a{
            color: #31A5E7;
        }
        .form-group a:link{
            color: #31A5E7;
        }
        .form-group a:visited{
            color: #31A5E7;
        }
        .form-group a:hover{
            color: #2B669A;
        }
        .form-group a:active{
            color: #2B669A;
        }
        .form-control {
            display: block;
            /*width: 100%;*/
            height: 30px;
            padding: 3px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 1px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        }
        .form-control:focus {
            /*border-color: #66afe9;*/
            border-color: #999;
            outline: 0;
            /*-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);*/
            /*box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);*/
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 6px rgba(0, 0, 0, .5);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 6px rgba(0, 0, 0, .5);
        }
        .form-control::-moz-placeholder {
            color: #999;
            opacity: 1;
        }
        .form-control:-ms-input-placeholder {
            color: #999;
        }
        .form-control::-webkit-input-placeholder {
            color: #999;
        }
        .form-group>label, .form-group>input{
            display: inline-block;
        }
        form .btn[value="submit"],.btn[value="add-address"],.btn[value="submit"]{
            display: block;
            text-align: center;
            /*background-color: #31A5E7;*/
            background-color: #444;
            color: #fff;
            width: 200px;
            padding: 10px 30px;
            margin: 0 auto;
            font-size: 16px;
            cursor: pointer;
            border: none;
            font-family: "微软雅黑","Microsoft Yahei",Arial,Helvetica,sans-serif,"宋体";
        }
        form .btn[value="submit"]:hover,.btn[value="add-address"]:hover,.btn[value="submit"]:hover{
            background-color: #333;
        }
        #container{
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <?php include("header.php"); ?>、
    <!--<form action="updatepwd.php" method="post">-->
        <!--<p><strong>输入新密码</strong></p>-->
        <!--<p><input type="text" class="input" name="password" id="username"><span id="chkmsg"></span></p>-->
        <!--<p><input type="text" class="input" name="password_again" id="email"><span id="chkmsg"></span></p> -->
        <!--<p><button type="submit" class="btn" id="sub_btn" value="submit">提交</button></p> -->
    <!--</form>-->
    <div id="container">
        <h3>修改密码</h3>
        <div id="change-password" class="hidden-wrap">
            <form action="updatepwd.php" method="post">

                <div class="form-group">
                    <label for="password">输入新密码</label>
                    <input type="password" placeholder="请输入新密码"  name="password" class="form-control" required="required"/>

                </div>
                <div class="form-group">
                    <label for="password_again">再次输入密码</label>
                    <input type="password" placeholder="请确认用户密码" name="password_again" class="form-control" required="required"/>
                </div>
                <div class="form-group">
                    <button class="btn" type="submit" value="submit">确认修改并提交</button>
                </div>
            </form>
        </div>
    </div>


</body>