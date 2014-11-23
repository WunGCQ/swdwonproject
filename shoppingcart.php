<?php
    
    include("conn/conn.php");
    session_start();
    $cart = $_SESSION["cart"];

    if($cart)
    {

    $info = array();
    $x = 0;
    foreach ($cart as $key => $value) {
        $list = array();

        if($key == "" || $value == "" || $value <= 0) continue;
        $query = mysql_query("select * from software where s_id='".$key."'",$conn);
        $res = mysql_fetch_array($query);
        if(!$res){
            echo "<script language='javascript'>alert('数据库查询错误');</script>";
            exit;
        }
        $list[0] = $res["s_id"];
        $list[1] = $res["s_imagepath"];
        $list[2] = $res["s_name"];
        $list[3] = $res["s_price"];
        $list[4] = $value;

        $info[$x] = $list;
        $x = $x + 1;
    }
    //unset($_SESSION["cart"]);

    if($_SESSION["u_id"])
    {
        $address = array();
        $query = mysql_query("select * from address where u_id = '".$_SESSION["u_id"]."'",$conn);
        if(!$query){
            echo "<script language='javascript'>alert('数据库查询错误');</script>";
        }
        $ax = 0;
        while($res = mysql_fetch_array($query))
        {
            $alist = array();
            $alist[0] = $res["a_id"];
            $alist[1] = $res["a_name"];
            $alist[2] = $res["a_telephone"];
            $alist[3] = $res["a_address"];

            $address[$ax] = $alist;
            $ax = $ax + 1;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>购物车</title>
    <script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/warning.js"></script>
    <script src="js/usercenter.js"></script>
    <script src="js/Shoppingcart.js"></script>
    <link rel="stylesheet" type="text/css" href="css/header.css"/>
    <link rel="stylesheet" type="text/css" href="css/footer.css"/>
    <link rel="stylesheet" type="text/css" href="css/model-window.css"/>
    <link rel="stylesheet" href="css/shoppping.css"/>
    <!--<link rel="stylesheet" type="text/css" href="css/user-center.css"/>-->
    <link rel="stylesheet" href="css/warning.css"/>
    <style>
        #container
        {
            width: 960px!important;
            padding-bottom: 150px;
        }
        .address{
            width: 465px;
            display: inline-block;
            font-size: 14px;
        }
        .amount-number{
            height: 30px!important;
        }
    </style>
</head>
<body onload="calculate_price()">
    <?php include("header.php");  ?>
    <div id="container">
        <h1 style="text-align: center;margin-bottom: 15px;">购物车</h1>
        <?php
            if(!$cart)
            {
                echo "
                    <div id=\"shoppingcart-null\">
            您的购物车为空，去商店看看吧！
            <a href='index.php'>去首页逛逛</a>
        </div>
                ";
            }
            else
            {
                echo "
                <div id=\"shoppingcart\" class=\"tab active-wrap\" style=\"text-align: center;\">
                <div class=\"shoppingcart-list\">
                <table style=\"margin: 10px auto;\">
                    <tr style=\"background-color: #fff;text-align: center;height: 40px;padding: 0px;\">
                        <th width=\"300px\">商品名称</th>
                        <th width=\"120px\">价格</th>
                        <th width=\"120px\">数量</th>
                        <th width=\"120px\">总价</th>
                        <th width=\"120px\">操作</th>
                    </tr>
                    <tbody>
            ";  

            for($i = 0;$i < $x;$i++)
            {   
                echo "
                    <tr id='prod".$info[$i][0]."'' class=\"software\">
                        <td>
                            <a href='product.php?s_id=".$info[$i][0]."'><img src='".$info[$i][1]."'/><span> ".$info[$i][2]."</span></a>
                        </td>
                        <td id='pri".$info[$i][3]."'>".$info[$i][3]."</td>
                        <td>
                            <div class=\"select-amount-wrap\">
                                <div class=\"amount-minus\">-</div>
                                <input id='amt".$info[$i][0]."' class=\"amount-number\" type=\"text\" value='".$info[$i][4]."''></input>
                                <div class=\"amount-add\">+</div>
                            </div>
                        </td>
                        <td></td>
                        <td><span class=\"delete-software\">删除</span></td>
                    </tr>
                ";
            }

            echo "
                <tr>
                        <td id=\"price-whole\" colspan=\"5\">3000</td>
                    </tr>
                    </tbody>
                </table>

            </div>
            <div id=\"select-address\" class=\"tab active-wrap\" style=\"text-align: left;\">
            ";

            if($_SESSION["u_id"])
            {
                for($i = 0;$i < $ax;$i++)
                {
                    echo "
                                        <div id='addr".$address[$i][0]."' class=\"address\">
                    <div>
                        <div class=\"address-name\">".$address[$i][1]."</div>
                        <div class=\"address-phone\">".$address[$i][2]."</div>
                        <div class=\"address-address\">".$address[$i][3]."</div>
                    </div>
                </div>
                    ";
                }
            }

            echo "
                  <div id=\"add-address-btn\" onclick=\"$('#add-address').show();\">
                    添加地址
                </div>
            </div>
            <div>";

            if($_SESSION["u_id"])
                echo "<button class=\"btn\" type=\"button\" value=\"submit\" onclick='makeorder(".$_SESSION["u_id"].")' style=\"margin-right:0px;width:150px;font-size: 20px;\">结算</button></div></div>";
            else 
                echo "<button class=\"btn\" type=\"button\" value=\"submit\" onclick='makeorder(-1)' style=\"margin-right:0px;width:150px;font-size: 20px;\">结算</button></div></div>";
            }

            
    ?>
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
                    <?php
                        if($_SESSION["u_id"])  
                            echo "<button id=\"btn_addaddr\"class=\"btn\" type=\"button\" value=\"submit\" onclick=\"addAddr(".$_SESSION["u_id"].")\">确认提交</button>";
                        else 
                            echo "<button id=\"btn_addaddr\"class=\"btn\" type=\"button\" value=\"submit\" onclick=\"addAddr('')\">确认提交</button>";
                    ?>
                </div>
            </form>
        </div>
    </div>
<!--<div id="warning">-->
    <!--<div id="warning-window">-->
        <!--<div id="warning-title">警告！</div>-->
            <!--<div id="warning-close" style="" onclick="$('#warning').hide()">×</div>-->
        <!--<div id="warning-wrap">-->
            <!--<div id="warning-content">-->
                <!--吾王赛高！-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->

<!--</div>-->
    </br >
    <?php include("footer.php");  ?>
</body>
<script>
    $(".amount-minus").attr("onclick","changeAmount(this,-1)");
    $(".amount-add").attr("onclick","changeAmount(this,1)");
    $(".delete-software").attr("onclick","delete_tab(this)");
    $(".address").attr("onclick","setAddress(this)");
</script>
</html>