<?php
    session_start();
    include("conn/conn.php");
    $u_id = $_SESSION["u_id"];
    $query = mysql_query("select * from user where u_id = '".$u_id."'",$conn);
    $info = mysql_fetch_array($query);
    $cart = $_SESSION["cart"];
?>
<!DOCTYPE html>
<html>
<head lang="chn">
    <meta charset="UTF-8">
    
    <title>用户中心</title>
    <script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/usercenter.js" type="text/javascript" charset="utf-8"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/header.css"/>
    <link rel="stylesheet" type="text/css" href="css/footer.css"/>
    <link rel="stylesheet" type="text/css" href="css/model-window.css"/>
    <link rel="stylesheet" type="text/css" href="css/user-center.css"/>
    <script src="js/cookie.min.js"></script>
    <style type="text/css">
        #header{
            font-size: 14px;
        }
    </style>
</head>
<body>
    <?php include("header.php"); ?>
    <div id="container">
            <div id="nav-container">
                <div class="long"></div>
                <div class="nav-bar active" onclick="change_tab(this)">个人信息</div>
                <!--<div class="nav-bar" onclick="change_tab(this)">信息管理</div>-->
                <div class="nav-bar" onclick="change_tab(this)">密码修改</div>
                <div class="nav-bar" onclick="change_tab(this)">收货地址</div>
                <div class="nav-bar" onclick="change_tab(this)">购物车</div>
                <div class="long"></div>
            </div>
        </div>
        <div id="tab-wrap">
            <div id="show-info" class="tab active">
                <table style="display: block;margin: 50px auto;text-align: center;width: 500px;">
                    <tr>
                        <th style="width: 100px;"></th>
                        <th style="width: 300px;"></th>
                        <th></th>
                    </tr>
                    <tbody>
                        <tr id="show-phonenumber" style="text-align: left;padding: 20px;margin: auto">
                            <td>手机号：</td> <td style="text-align: center;"><?php echo $info["u_telephone"] ?></td>
                            <td><button type="button" class="btn" value="change" onclick="$('#change-phone').show();" style="padding: 10px ;width: 120px;font-size: 14px;">修改手机号</button></td>
                        </tr>

                        <tr id="show-email" style="text-align: left;padding: 20px;">
                            <td>邮件地址：</td> <td style="text-align: center;"><?php echo $info["u_email"] ?></td>
                            <td style="height: 70px;">
                                <button type="button" class="btn" value="change" onclick="$('#change-email').show();" style="padding: 10px ;width: 120px;font-size: 14px;">修改邮件地址</button>
                            </td>
                        </tr>
                        <?php
                            if($info["u_status"] == 0)
                                echo "
                                    <tr style=\"text-align: center;padding: 20px;\">
                                        <td colspan=\"3\"> <a href=\"\" id=\"a-check-mail\">您的邮箱还未验证，请及时验证！</a></td>
                                    </tr>
                                ";
                        ?>
                    </tbody>


                </table>

            </div>
            <div id="change-password" class="tab">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="old-password">原密码</label>
                        <input id="old-password" type="password" placeholder="请输入原密码" name="old-password" class="form-control" required="required"/>

                    </div>
                    <div class="form-group">
                        <label for="new-password">密码</label>
                        <input id="new-password" type="password" placeholder="请输入用户密码" name="new-password" class="form-control" required="required"/>

                    </div>
                    <div class="form-group">
                        <label for="password-again">再次输入密码</label>
                        <input id="password-again" type="password" placeholder="请确认用户密码" name="password-again" class="form-control" required="required"/>
                    </div>
                    <div class="form-group">
                        <?php
                            echo "<button class=\"btn\" type=\"button\" value=\"submit\" onclick=changepwd(".$u_id.")>确认修改并提交</button>"; 
                        ?>
                    </div>
                </form>
            </div>
            <div id="admin-address"  class="tab" style="text-align: center;">
                <?php 
                    include("conn/conn.php");
                    $ans = mysql_query("select * from address where u_id = '".$_SESSION['u_id']."'");
                    while($info = mysql_fetch_array($ans))
                    {
                        echo "
                            <div id='".$info["a_id"]."' class=\"address\">
                    <div>
                        <div id=\"addr_name\" class=\"address-name\">".$info["a_name"]."</div>
                        <div id=\"addr_telephone\" class=\"address-phone\">".$info["a_telephone"]."</div>
                        <div id=\"addr_address\" class=\"address-address\">".$info["a_address"]."</div>
                    </div>

                    <div>
                        <div class=\"delete-address\">删除</div>
                        <div class=\"change-address\">修改</div>
                    </div>

                </div>
                        ";
                    }
                ?>
                <div>
                    <input id="address_id" type="hidden" />
                    <button id="add_address" class="btn" type="button" value="add-address" onclick="$('#add-address').show();">添加收货地址</button>
                </div>

            </div>
            <div id="shoppingcart" class="tab" style="text-align: center;">
                <div class="shoppingcart-list">
                    <table style="margin: 10px auto;">
                        <tr style="background-color: #fff;text-align: center;height: 40px;padding: 0px;">
                            <th width="300px">商品名称</th>
                            <th width="120px">价格</th>
                            <th width="120px">数量</th>
                            <th width="120px">总价</th>
                            <th width="120px">操作</th>
                        </tr>
                        <tbody>
                            <tr class="software">
                                <td>商品名称</td>
                                <td>20</td>
                                <td>
                                    <div class="select-amount-wrap">
                                        <div class="amount-minus">-</div>
                                        <input class="amount-number" type="text" value="1"/>
                                        <div class="amount-add">+</div>
                                    </div>
                                </td>
                                <td></td>
                                <td><span class="delete-software">删除</span></td>
                            </tr>
                            <tr class="software">
                                <td>
                                    <img src="img/saber.jpg" alt=""/><span> Saber骑着摩托车奔驰在冬木市,吾王赛高！</span>
                                </td>
                                <td>99.99</td>
                                <td>
                                    <div class="select-amount-wrap">
                                        <div class="amount-minus">-</div>
                                        <input class="amount-number" type="text" value="1"/>
                                        <div class="amount-add">+</div>
                                    </div>
                                </td>
                                <td></td>
                                <td><span class="delete-software">删除</span></td>
                            </tr>


                            <tr>
                                <td id="price-whole" colspan="5">3000</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div>
                    <button class="btn" type="button" value="submit" onclick="" style="margin-right:0px;width:150px;font-size: 20px;">结算</button>
                </div>

            </div>
        </div>
    </div>
    <div class="model-window" id="change-address">
        <div class="window-main" id="address-window">
            <span style="position:relative;float: right;font-size: 30px;cursor: pointer;" onclick="$('#change-address').hide();document.getElementById('change-address-form').reset();">×</span>
            <form action="" method="post" id="change-address-form">
                <div class="form-group">
                    <!--<label for="username">用户名</label>-->
                    <input id="cname" type="text" placeholder="请输入姓名" name="name" class="form-control"/>

                </div>
                <div class="form-group">
                    <!--<label for="password">密码</label>	-->
                    <input id="ctelephone" type="text" placeholder="请输入手机号" name="phone" class="form-control"/>

                </div>
                <div class="form-group">
                    <!--<label for="password">密码</label>	-->
                    <textarea id="caddress" placeholder="请输入收货地址" name="address" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn" type="button" value="submit" onclick="changeAddr()">确认提交</button>
                </div>
            </form>
        </div>
    </div>
    <div class="model-window" id="add-address">
        <div class="window-main" id="address-window">
            <span style="position:relative;float: right;font-size: 30px;cursor: pointer;" onclick="$('#add-address').hide();document.getElementById('add-address-form').reset();">×</span>
            <form action=" " method="post" id="add-address-form">
                <div class="form-group">
                    <!--<label for="username">用户名</label>-->
                    <input id="name" type="text" placeholder="请输入姓名" name="name" class="form-control"/>

                </div>
                <div class="form-group">
                    <!--<label for="password">密码</label>    -->
                    <input id="telephone" type="text" placeholder="请输入手机号" name="phone" class="form-control"/>

                </div>
                <div class="form-group">
                    <!--<label for="password">密码</label>    -->
                    <textarea id="address" placeholder="请输入收货地址" name="address" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <?php  echo "<button id=\"btn_addaddr\"class=\"btn\" type=\"button\" value=\"submit\" onclick=\"addAddr(".$u_id.")\">确认提交</button>"; ?>
                </div>
            </form>
        </div>
    </div>
    <div class="model-window" id="change-amount">
        <div class="window-main" id="amount-window">
            <span style="position:relative;float: right;font-size: 30px;cursor: pointer;" onclick="$('#change-amount').hide();document.getElementById('change-amount-form').reset();">×</span>
            <form action="" method="post" id="change-amount-form">
                <div class="form-group">
                    <input type="number" placeholder="请输入数量" name="amount" class="form-control"/>

                </div>
                <div class="form-group">
                    <button class="btn" type="button" value="submit">确认提交</button>
                </div>
            </form>
        </div>
    </div>
<div class="model-window" id="change-email">
    <div class="window-main" id="email-window">
        <span style="position:relative;float: right;font-size: 30px;cursor: pointer;" onclick="$('#change-email').hide();document.getElementById('change-mail-form').reset();">×</span>
        <form action="" method="post" id="change-mail-form">
            <div class="form-group">
                <label for="password">邮件地址</label>
                <input id="newemail" type="email" placeholder="请输入email" name="email" class="form-control" required="required" pattern=" /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.(?:com|cn)$/"/>
            </div>
            <div class="form-group">
                <?php
                    echo "<button class=\"btn\" type=\"button\" value=\"submit\" onclick=changeemail(".$u_id.")>确认提交</button>"; 
                ?>
            </div>
        </form>
    </div>
</div>
<div class="model-window" id="change-phone">
    <div class="window-main" id="phone-window">
        <span style="position:relative;float: right;font-size: 30px;cursor: pointer;" onclick="$('#change-phone').hide();document.getElementById('change-phone-form').reset();">×</span>
        <form action="" method="post" id="change-phone-form">
            <div class="form-group">
                <label for="phonenumber">手机号</label>
                <input id="newphone" type="text" placeholder="请输入手机号" name="phonenumber" class="form-control" required="required"/>

            </div>
            <div class="form-group">
                <?php
                    echo "<button class=\"btn\" type=\"button\" value=\"submit\" onclick=changephone(".$u_id.")>确认提交</button>"; 
                ?>
            </div>
        </form>
    </div>
</div>


    <!--<div id="footer">-->

    <!--</div>-->
</body>
<script>
    $('.change-address').attr("onclick","showChangeAddressWindow(this)");
    $('.change-amount-a').attr('href','javascript:$("#change-amount").show();');
    $('.delete-address').attr("onclick","deleteAddr(this)");
    $(".amount-minus").attr("onclick","changeAmount(this,-1)");
    $(".amount-add").attr("onclick","changeAmount(this,1)");
    $(".delete-software").attr("onclick","delete_tab(this)");
    calculate_price();
</script>
</html>