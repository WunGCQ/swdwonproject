<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    
    <title>用户中心</title>
    <script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/usercenter.js" type="text/javascript" charset="utf-8"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/header.css"/>
    <link rel="stylesheet" type="text/css" href="css/footer.css"/>
    <link rel="stylesheet" type="text/css" href="css/model-window.css"/>
    <link rel="stylesheet" type="text/css" href="css/user-center.css"/>
</head>
<body>
    <?php include("header.php"); ?>
    <div id="container">
        <div id="left-bar">
            <ul id="nav">
                <li><a href="javascript: changeTab('change-info');">信息管理</a></li>
                <li><a href="javascript:changeTab('change-password');">密码修改</a></li>
                <li><a href="javascript:changeTab('admin-address');">收货地址</a></li>
                <li><a href="javascript:changeTab('shoppingcart');">购物车</a></li>
            </ul>
        </div>
        <div id="right-bar">
            <div id="change-info" class="active-wrap">
                <form action="chgmsg.php" method="post">
                    <div class="form-group">
                        <label for="phonenumber">手机号</label>
                        <input type="tel" placeholder="请输入手机号" name="phonenumber" class="form-control" required="required"/>

                    </div>
                    <div class="form-group">
                        <label for="password">邮件地址</label>
                        <input type="email" placeholder="请输入email" name="email" class="form-control" required="required" pattern="^\w+[-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$"/>
                    </div>
                    <div class="form-group">
                        <button class="btn" type="submit" value="submit" required="">确认修改并提交</button>
                    </div>
                </form>
            </div>
            <div id="change-password" class="hidden-wrap">
                <form action="chgpwd.php" method="post">
                    <div class="form-group">
                        <label for="old-password">原密码</label>
                        <input type="password" placeholder="请输入原密码" name="old-password" class="form-control" required="required"/>

                    </div>
                    <div class="form-group">
                        <label for="new-password">密码</label>
                        <input type="password" placeholder="请输入用户密码" name="new-password" class="form-control" required="required"/>

                    </div>
                    <div class="form-group">
                        <label for="password-again">再次输入密码</label>
                        <input type="password" placeholder="请确认用户密码" name="password-again" class="form-control" required="required"/>
                    </div>
                    <div class="form-group">
                        <button class="btn" type="submit" value="submit" required="">确认修改并提交</button>
                    </div>
                </form>
            </div>
            <div id="admin-address" class="hidden-wrap" style="text-align: center;">
                <?php
                    include("conn/conn.php");
                    $ans = mysql_query("select * from address where u_id = '".$_SESSION['u_id']."'");
                    while($info = mysql_fetch_array($ans))
                    {
                        echo "
                        <div class=\"address\">
                            <div>
                                <div class=\"address-name\">".$info["a_name"]."</div>
                                    <div class=\"address-phone\">".$info["a_telephone"]."</div>
                                <div class=\"address-address\">".$info["a_address"]."</div>
                            </div>

                            <div>
                                <div class=\"delete-address\">删除</div>
                                <div class=\"change-address\">修改</div>
                            </div>
                        </div>";
                    }  
                ?>
                <div>
                    <button class="btn" type="button" value="add-address" onclick="$('#change-address').show();">添加收货地址</button>
                </div>

            </div>
            <div id="shoppingcart" class="hidden-wrap" style="text-align: center;">
                <div class="shoppingcart-list">
                    <table style="margin: 10px auto;">
                        <tr style="background-color: #fff;text-align: center;border-bottom: 1px solid #ccc;">
                            <th width="300px">商品名称</th>
                            <th width="120px">价格</th>
                            <th width="120px">数量</th>
                            <th width="120px">总价</th>
                            <th width="120px">操作</th>
                        </tr>
                        <tbody>
                            <tr>
                                <td>商品名称</td>
                                <td>单价</td>
                                <td>数量 <a href="" class="change-amount-a">修改</a></td>
                                <td>总价</td>
                                <td><a href="#">删除</a></td>
                            </tr>

                            <tr>
                                <td>商品名称</td>
                                <td>单价</td>
                                <td>数量 <a href="#" class="change-amount-a">修改</a></td>
                                <td>总价</td>
                                <td><a href="#">删除</a></td>
                            </tr>
                            <tr>
                                <td id="price-whole" colspan="5">3000</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div>
                    <button class="btn" type="button" value="submit" onclick="">结算</button>
                </div>

            </div>
        </div>
    </div>
    <div class="model-window" id="change-address">
        <div class="window-main" id="address-window">
            <span style="position:relative;float: right;font-size: 30px;cursor: pointer;" onclick="$('#change-address').hide()">×</span>
            <form action="" method="post">
                <div class="form-group">
                    <!--<label for="username">用户名</label>-->
                    <input type="text" placeholder="请输入姓名" name="name" class="form-control"/>

                </div>
                <div class="form-group">
                    <!--<label for="password">密码</label>	-->
                    <input type="password" placeholder="请输入手机号" name="phone" class="form-control"/>

                </div>
                <div class="form-group">
                    <!--<label for="password">密码</label>	-->
                    <textarea placeholder="请输入收货地址" name="address" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn" type="button" value="submit">确认提交</button>
                </div>
            </form>
        </div>
    </div>
    <div class="model-window" id="change-amount">
        <div class="window-main" id="amount-window">
            <span style="position:relative;float: right;font-size: 30px;cursor: pointer;" onclick="$('#change-amount').hide()">×</span>
            <form action="" method="post">
                <div class="form-group">
                    <input type="number" placeholder="请输入数量" name="amount" class="form-control"/>

                </div>
                <div class="form-group">
                    <button class="btn" type="button" value="submit">确认提交</button>
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
</script>
</html>