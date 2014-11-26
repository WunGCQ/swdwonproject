<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <title>思唯特：控制台</title>
    <!--<script src="foundation/js/foundation.min.js"></script>-->
    <script src="js/page_control.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/ajaxfileupload.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <!--<script src="js/bootstrap.min.js"></script>-->
    <link rel="stylesheet" href="font-awesome-4.2.0/css/font-awesome.css"/>
    <link rel="stylesheet" href="css/consolestyle.css"/>
    <link rel="stylesheet" href="css/createad.css"/>
    <link rel="stylesheet" href="css/Response.css"/>
    <link rel="stylesheet" href="css/homepage.css"/>
    <link rel="stylesheet" href="css/ad-management.css" />
    <!--临时样式表 头-->
    <style>
    </style>
    <!--临时样式表 尾-->

<body onresize="setSizes()">
<div id="container">

    <div id="left-bar" class="columns">
        <ul id="nav">
            <li class="logo-nav" ><a href="#" target="_blank"><img src="img/logo.png" alt="company logo" class="company-logo"/></a></li>
            <li class="nav-bar nav-active" id="homepage"><span class="fa fa-home"></span><span class="hidden-xs">首页</span></li>
            <li class="nav-bar" id="create-software"><span class="fa fa-pencil"></span><span class="hidden-xs">添加商品</span></li>
            <li class="nav-bar" id="change-software"><span class="fa fa-star"></span><span class="hidden-xs">修改商品</span></li>
            <li class="nav-bar" id="manage-software"><span class="fa fa-wrench"></span><span class="hidden-xs">管理商品</span></li>
            <li class="nav-bar" id="manage-user"><span class="fa fa-user"></span>&nbsp;<span class="hidden-xs">用户管理</span></li>
            <li class="nav-bar" id="numbers"><span class="fa fa-table"></span><span class="hidden-xs">号码列表</span></li>
            <li class="nav-bar" id="add-number"><span class="fa fa-cloud"></span><span class="hidden-xs">添加号码</span></li>
            <li class="nav-bar" id="change-settings"><span class="fa fa-cogs"></span><span class="hidden-xs">修改配置</span></li>

        </ul>
    </div>
    <div id="top-bar" class="columns">
        <div id="top-bar-units">

            <div class="exit-block top-bar-hover-elements">
                <span class="fa fa-mail-forward"></span><div class="hidden-xs">注销</div>
            </div>


            <div class="hr-h">
            </div>
            <!--显示用户名-->
            <div class="user-info-block top-bar-hover-elements">
                <div id="username" class="hidden-xs"></div>
                <ul id="list-menu">
                    <li>
                        <span class="fa fa-lastfm"></span>选项一
                        <!--<div class="hr-v"></div>-->
                    </li>

                    <li>
                        <span class="fa fa-magic"></span>选项②
                        <!--<div class="hr-v"></div>-->
                    </li>

                    <li>
                        <span class="fa fa-navicon"></span>选项叁
                        <!--<div class="hr-v"></div>-->
                    </li>
                </ul>
            </div>

            <div class="hr-h">
            </div>

            <div class="aboutus-block top-bar-hover-elements hidden-xs">
                关于我们
            </div>

        </div>


    </div>
    <div id="right-tab-block">
        <div class="tab-block active-tab" id="homepage-tab">
            <h3 class="tab-title">
                思维特：首页
            </h3>
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-10 col-md-offset-1">
                <div class="circle-nav"><span class="fa fa-pencil"></span><span class="hidden-xs">添加商品</span></div>
                <div class="circle-nav"><span class="fa fa-star"></span><span class="hidden-xs">修改商品</span></div>
                <div class="circle-nav"><span class="fa fa-wrench"></span><span class="hidden-xs">管理商品</span></div>
                <div class="circle-nav"><span class="fa fa-user"></span><span class="hidden-xs">用户管理</span></div>
                <div class="circle-nav"><span class="fa fa-table"></span><span class="hidden-xs">号码列表</span></div>
                <div class="circle-nav"><span class="fa fa-cloud"></span><span class="hidden-xs">添加号码</span></div>
                <div class="circle-nav"><span class="fa fa-cogs"></span><span class="hidden-xs">修改配置</span></div>

            </div>


        </div>
        <div id="add_new_software" class="tab-block hidden-tab" id="create-software-tab">
            <h3 class="tab-title">
                添加商品
            </h3>

            <div class=" col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3" id="create-software-block">
                <div class="row">
                    <span style="margin-bottom: 10px;display: block;">请填写商品信息</span>
                </div>
                <form name="form" action="" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="create-software-name" class="visible-lg col-lg-3 control-label">商品名称</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
                            <input id="nsw_name" type="text" class="form-control" name="create-software-name" placeholder="请填写商品名称" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="create-software-name" class="visible-lg col-lg-3 control-label">软件发行商</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
                            <input id="nsw_manu" type="text" class="form-control" name="create-software-name" placeholder="请填写软件发行商" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="create-software-price" class="visible-lg col-lg-3 control-label">商品价格</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
                            <input id="nsw_price" type="number" class="form-control" name="create-software-price" placeholder="请填写商品价格" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="create-software-content" class="visible-lg col-lg-3 control-label">商品类别</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 " >
                            <select id="nsw_cate" class="form-control" name="create-software-type" >
                                <option value ="1">Windows平台</option>
                                <option value ="2">MAC平台</option>
                                <option value ="3">IOS平台</option>
                                <option value ="4">数码周边</option>
                                <option value ="5">图书文献</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="create-software-intro" class="visible-lg col-lg-3 control-label">商品介绍</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
                            <textarea id="nsw_introd" type="text" class="form-control" name="create-software-intro" placeholder="请填写商品介绍"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="create-software-setting" class="visible-lg col-lg-3 control-label">商品配置</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
                            <input id="nsw_req" type="text" class="form-control" name="create-software-setting" placeholder="请填写商品配置" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="create-software-thumb" class="visible-lg col-lg-3 control-label">选择预览图</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
                            <input id="nsw_image" type="file" class="form-control" name="nsw_image"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <button id="add_software" type="button" class="btn btn-basic">添加商品</button>
                    </div>


                </form>
            </div>
        </div>
        <div class="tab-block hidden-tab" id="change-software-tab">
            <h3 class="tab-title">
                修改商品
            </h3>
            <div class=" col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3" id="change-software-block">
                <div class="row">
                    <span style="margin-bottom: 10px;display: block;">请填写商品信息</span>
                </div>
                <form id="change_now_software" class="form-horizontal" role="form">
                    <input id="csw_id" type="hidden" />
                    <div class="form-group">
                        <label for="change-software-name" class="visible-lg col-lg-3 control-label">商品名称</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
                            <input id="csw_name" type="text" class="form-control" name="change-software-name" id="change-software-name" placeholder="请填写商品名称" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="change-software-price" class="visible-lg col-lg-3 control-label">软件发行商</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
                            <input id="csw_manu" type="text" class="form-control" name="change-software-price" placeholder="请填写软件发行商" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="change-software-price" class="visible-lg col-lg-3 control-label">商品价格</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
                            <input id="csw_price" type="number" class="form-control" name="change-software-price" placeholder="请填写商品价格" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="change-software-content" class="visible-lg col-lg-3 control-label">商品类别</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 " >
                            <select id="csw_cate" class="form-control" name="change-software-content">
                                <option value ="1">Windows平台</option>
                                <option value ="2">MAC平台</option>
                                <option value ="3">IOS平台</option>
                                <option value ="4">数码周边</option>
                                <option value ="5">图书文献</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="change-software-intro" class="visible-lg col-lg-3 control-label">商品介绍</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
                            <textarea id="csw_introd" type="text" class="form-control" name="change-software-intro" placeholder="请填写商品介绍"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="change-software-setting" class="visible-lg col-lg-3 control-label">商品配置</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
                            <input id="csw_req" type="text" class="form-control" name="change-software-setting" placeholder="请填写商品配置" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="change-software-thumb" class="visible-lg col-lg-3 control-label">选择预览图</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
                            <input id="csw_image" type="file" class="form-control" name="change-software-thumb"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <button id="change_software" type="button" class="btn btn-basic">修改商品</button>
                    </div>


                </form>
            </div>

        </div>
        <div class="tab-block hidden-tab" id="manage-software-tab">
            <h3 class="tab-title">
                管理商品
            </h3>
            <table style="width: 100%">
                <thead>
                    <tr>
                        <th style="width: 5%;display:none;">id</th>
                        <th style="width: 10%">名称</th>
                        <th style="width: 5%">缩略图</th>
                        <th style="width: 8%">类别</th>
                        <th style="width: 5%">价格</th>
                        <th style="width: 10%">发行商</th>
                        <th style="width: 30%">介绍</th>
                        <th style="width: 15%">配置</th>
                        <th style="width: 15%">操作</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include("conn/conn.php");
                    $query = mysql_query("select * from software order by s_id desc");
                    while($info = mysql_fetch_array($query))
                    {
                        echo "   
                        <tr id='software".$info["s_id"]."'>
                            <td style=\"display:none;\" >".$info["s_id"]."</td>
                            <td>".$info["s_name"]."</td>
                            <td><img src='".$info["s_imagepath"]."' style=\"width:50px;height:50px;\" /></td>
                         	";
                        	
                        	if($info["s_cate"] == 1)  echo "<td>Windows平台</td>";
                            else if($info["s_cate"] == 2)  echo "<td>Mac平台</td>";
                        	else if($info["s_cate"] == 3)  echo "<td>IOS平台</td>";
                        	else if($info["s_cate"] == 4)  echo "<td>数码周边</td>";
                        	else echo "<td>图书文献</td>";
                                
                        echo"
                            <td>".$info["s_price"]."</td>
                            <td>".$info["s_manufac"]."</td>
                            <td>".$info["s_introd"]."</td>
                            <td>".$info["s_requirement"]."</td>
                            <td>
                                <span class=\"change-software\" onclick=jumpto_change(this)>修改</span>
                                <span class=\"delete-software\" onclick=delete_nowsoftware('".$info["s_id"]."')>删除</span>
                            </td>
                        </tr>";
                    }
                ?>change_nowsoftware
                </tbody>
            </table>

        </div>
        <div class="tab-block hidden-tab" id="manage-user-tab">
            <h3 class="tab-title">
                用户管理
            </h3>
            <table style="width: 100%">
                <thead>
                <tr id="manage-user-tab-head">
                    <th style="width: 10%">id</th>
                    <th style="width: 10%">用户名</th>
                    <th style="width: 15%">手机号</th>
                    <th style="width: 15%">邮件地址</th>
                    <th style="width: 5%">状态</th>
                    <th style="width: 5%">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    include("conn/conn.php");
                    $query = mysql_query("select * from user where u_isadmin = '0' order by u_id desc",$conn);
                    while($info = mysql_fetch_array($query))
                    {
                        echo "
                              <tr id='user".$info["u_id"]."'>
                                <td>".$info["u_id"]."</td>
                                <td>".$info["u_name"]."</td>
                                <td>".$info["u_telephone"]."</td>
                            ";
                            if($info["u_status"] == 1) 
                                echo "<td><font color='green'>已激活</font></td>";
                            else
                                echo "<td><font color='red'>未激活</font></td>";
                        echo "
                            <td>".$info["u_email"]."</td>
                                <td>
                                    <span class=\"delete-user\" onclick=\"delete_user('".$info["u_id"]."')\">删除</span>
                                </td>
                                </tr>
                        ";
                    }
                ?>
                </tbody>
            </table>
        </div>
        <div class="tab-block hidden-tab" id="numbers-tab">
            <h3 class="tab-title">
                号码列表
            </h3>
            <table style="width: 100%">
                <thead>
                <tr>
                    <th style="width: 10%">id</th>
                    <th style="width: 30%">序列号</th>
                    <th style="width: 15%">所属软件</th>
                    <th style="width: 15%">是否可用</th>
                    <th style="width: 5%">操作</th>
                </tr>
                </thead>
                <tbody id="sn_number_head">
                <?php
                    include("conn/conn.php");
                    $query = mysql_query("select sn_id,sn_number,sn_issale,s_name from s_number,software where s_number.s_id = software.s_id order by sn_id desc",$conn);
                    while($info = mysql_fetch_array($query))
                    {
                        echo "
                            <tr id='snumber".$info["sn_id"]."'>
                                <td>".$info["sn_id"]."</td>
                                <td>".$info["sn_number"]."</td>
                                <td>".$info["s_name"]."</td>
                            ";
                        if($info["sn_issale"] == 1) 
                            echo "<td><font color='red'>已使用</font></td>";
                        else
                            echo "<td><font color='green'>未使用</font></td>";
                        echo "
                            <td>
                                <span class=\"delete-number\" onclick=\"delete_snumber('".$info["sn_id"]."')\">删除</span>
                            </td>
                            </tr>
                        ";
                    }
                ?>
                </tbody>
            </table>
        </div>
        <div class="tab-block hidden-tab" id="add-number-tab">
            <h3 class="tab-title">
                添加号码
            </h3>
            <div class=" col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3" id="add-number-block">
                <div class="row">
                    <span style="margin-bottom: 10px;display: block;">请填写序列号信息</span>
                </div>
                <form class="form-horizontal" role="form">

                    <div class="form-group">
                        <label for="add-number-number" class="visible-lg col-lg-3 control-label">序列号</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
                            <textarea type="text" class="form-control" name="add-number-number" id="add-number-number" placeholder="请填写序列号"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="add-number-software" class="visible-lg col-lg-3 control-label">所属软件</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 " >
                            <select class="form-control" name="add-number-software" id="add-number-software">
                                <?php
                                    include("conn/conn.php");
                                    $query = mysql_query("select s_id,s_name from software",$conn);
                                    while($info = mysql_fetch_array($query))
                                    {
                                        echo "<option value ='".$info["s_id"]."'>".$info["s_name"]."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-basic" id="add-number-submit-btn" onclick="add_snnumber()">添加序列号</button>
                    </div>


                </form>
            </div>

    </div>
        <div class="tab-block hidden-tab" id="change-settings-tab">
            <h3 class="tab-title">
                修改配置
            </h3>
            <div class=" col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3" id="add-number-block">
                <div class="row">
                    <span style="margin-bottom: 10px;display: block;">在这里可以修改你的个人配置</span>
                </div>
                <form class="form-horizontal" role="form">
                    <?php 
                        $file = fopen("files/config.txt", "r") or die("Unable to open file!");
                        $domain = fgets($file);
                        $remail = fgets($file);
                        $semail = fgets($file);
                        $semail_password = fgets($file);
                        fclose($file);
                    ?>
                    <div class="form-group">
                        <label for="change-domain-name" class="visible-lg col-lg-3 control-label">域名</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
                            <input type="text" class="form-control" name="change-domain-name" id="change-domain-name" placeholder="请填写您的域名" value=<?php echo "'".$domain."'"?>/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="change-receive-email" class="visible-lg col-lg-3 control-label">订单提醒邮箱</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
                            <input type="email" class="form-control" name="change-receive-email" id="change-receive-email" placeholder="请填写接受订单的邮箱" value=<?php echo "'".$remail."'"?>/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="change-send-email" class="visible-lg col-lg-3 control-label">发送邮件邮箱</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
                            <input type="email" class="form-control" name="change-send-email" id="change-send-email" placeholder="请填写发送邮件的邮箱" value=<?php echo "'".$semail."'"?>/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="change-send-email" class="visible-lg col-lg-3 control-label">发送邮件邮箱密码</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
                            <input type="password" class="form-control" name="change-send-email" id="change-send-email-password" placeholder="请填写发送邮件的邮箱" value=<?php echo "'".$semail_password."'"?>/>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="button" class="btn btn-basic" id="change-settings-submit-btn" onclick="changeconfig()">保存配置</button>
                    </div>


                </form>
            </div>

        </div>


</div>
<script>
    _init();
    $("#add_software").attr("onclick","add_newsoftware()");
</script>
</body>
</html>