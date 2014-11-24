<?php

    $s_id = stripslashes(trim($_GET['s_id'])); 
    include("conn/conn.php");
    $sql = mysql_query("select * from software where s_id = '".$s_id."'",$conn);
    $amt = mysql_query("select COUNT(*) as cnt from s_number where sn_issale = '0' and s_id = '".$s_id."'",$conn);
    if(!$sql || !$amt) echo "<script>alert('数据库查询错误');;</script>";
    $info = mysql_fetch_array($sql);
    $arr = mysql_fetch_array($amt);
    $amount = $arr["cnt"];
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="思维特" content="一个在线的软件商店">
    <title>软件</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/index.js"></script>
    <script src="js/product.js"></script>
    <script src="js/cookie.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/header.css"/>
    <link rel="stylesheet" type="text/css" href="css/footer.css"/>
    <link rel="stylesheet" type="text/css" href="css/model-window.css"/>
    <style>
        body{
            position: relative;
            width: 100%;
            height: auto;
            padding: 0px;
            margin: 0px;
            font-family: "微软雅黑","Microsoft Yahei",Arial,Helvetica,sans-serif,"宋体";
            font-size: 14px;
            text-align: center;
        }

        #container{
            width: 960px;
            padding: 10px;
            margin: 0px auto;
            text-align: center;

        }
        #brief-info{
            width: 100%;
            height: 570px;
            margin-top: -9px;
            background-color: #eee;
            text-align: center;
        }
        #brief-info-content{
            margin: 0px auto;
            height: 580px;
            padding-top: 20px;
            width: 1024px;
            display: inline-block !important;
        }
        #brief-info-images,#brief-info-text{
            display: inline-block !important;
            vertical-align: top;
            height: 500px;
        }
        #brief-info-images{
            width: 500px;
        }
        #brief-info-text{
            width: 480px;
        }
        #brief-info-text>*{
            margin: 5px 20px;
            padding: 20px;
            font-size: 20px;
            width: 100%;
            text-align: justify;
        }
        #brief-info-images img{
            max-height: 470px;
        }
        #product-name{
            padding-top: 0px;
            font-size: 20px;
            color: #666;
            border-bottom: 1px solid #ccc;
        }
        #product-price{
            color: #f60;
            font-size: 28px;
            border-bottom: 1px solid #ccc;

        }
        #product-price:before{
            content: "￥";
        }
        #select-amount-wrap{
            border-bottom: 1px solid #ccc;
        }
        #select-amount-wrap>div{
            display: inline-block;
            vertical-align: top;
        }
        #amount-minus,#amount-add{
            background-color: #dedede;
            text-align: center;
            width: 32px;
            height: 32px;
            border: 1px solid #999;
            cursor: pointer;
            margin-top: 0px;
            -webkit-user-select: none;
        }
        #amount-minus{
            background-color: #f1f1f1;
        }
        #amount-number{
            background-color: #fff;
            text-align: center;
            width: 48px;
            height: 30px;
            line-height: 28px;
            border-top: 1px solid #999;
            border-bottom: 1px solid #999;
            border-left: none;
            border-right: none;
            margin: 0px -6px 0px -6px;
            font-family: "微软雅黑","Microsoft Yahei",Arial,Helvetica,sans-serif,"宋体";
            outline: none;
        }
        #product-amount{
            border-bottom: 1px solid #ccc;
        }
        #product-amount:before{
            content: "库存:  ";
        }
        #buybuybuy .btn{
            display: inline-block;
            vertical-align: top;
            font-size: 16px;
            color: #fff;
            padding: 10px 20px;
            cursor: pointer;
            border: none;
            border-radius: 1px;
            font-family: "微软雅黑","Microsoft Yahei",Arial,Helvetica,sans-serif,"宋体";
        }
        #buybuybuy form{
            width: auto;
            display: inline-block;
        }
        button[value="buy_now"]{
            background-color:#EA5245;
            margin-right: 20px;
        }
        button[value="buy_now"]:hover{
            background-color: #cc483c;
        }
        button[value="add_into_cart"]{
            background-color: #31A5E7;
        }
        button[value="add_into_cart"]:hover{
            background-color: #319ddd;
        }
        #product-nav-container{
            width: 980px;
            margin: 0px auto;
            height: 40px;
            padding: 0px;
        }
        #product-nav-container>div{
            display: inline-block;
            vertical-align: bottom;
            margin-left: -5px;
        }
        .product-info{
            width: 100px;
            height: 40px;
            line-height: 40px;
            border-bottom: 1px solid #ccc;
            border-top: none;
            border-left: none;
            border-right: none;
            cursor: pointer;
        }
        #product-nav-container .active{
            border-bottom: none;
            border-top: 2px solid #28a4c9;
            border-left: 1px solid #ccc;
            border-right: 1px solid #ccc;
        }
        #product-nav-container .long{
            height: 40px;
            width: 580px;
            border-bottom: 1px solid #ccc;
        }
        #tab-wrap{
            width: 980px;
            margin: 0px auto;
        }
        .tab{
            display: none;
            width: 100%;
            height: auto;
            padding: 20px;
        }
        .tab article{
            text-align: left;
            margin-left: 25px;
        }
        #tab-wrap .active{
            display: block;
        }



    </style>
</head>
<body>
<?php include("header.php"); ?>
<div id="brief-info">
    <div id="brief-info-content">
        <div id="brief-info-images" style="display:inline-block;">
            <img src="img/saber.jpg" alt=""/>
        </div>
        <div id="brief-info-text" style="display:inline-block;">
            <div id="product-name">
                <?php echo $info["s_name"]; ?>
            </div>
            <div id="product-price">
                <?php echo $info["s_price"]; ?>
            </div>
            <div id="product-amount">
                <?php echo $amount; ?>
                <?php echo "<input id=\"s_total\" name=\"s_total\" type=\"hidden\" value=".$amount." />";  ?>
            </div>
            <div id="select-amount-wrap">
                <div>数量：</div>
                <div id="amount-minus" onclick="changeAmount(-1)">-</div>
                <input id="amount-number" type="text" value="1"/>
                <div id="amount-add" onclick="changeAmount(1)">+</div>
            </div>
            <div id="buybuybuy">
                <input name="amount" id="buy-now-input" value="1" style="display:none;"/>
                <button class="btn" type="submit" value="buy_now" required="" onclick="buy_now()">立即购买</button>

                <?php  echo "<input id=\"softw_id\" name=\"software_id\" type=\"hidden\" value=".$info["s_id"]." />";  ?>
                <input name="amount" id="add-into-cart-input" value="1" style="display:none;"/>
                <button class="btn" type="button" value="add_into_cart" required="" onclick="add_in_cart_onclick()">加入购物车</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="container">
    <div id="product-nav-container">
        <div class="product-info active" onclick="change_tab(this)">简介</div>
        <div class="product-info" onclick="change_tab(this)">配置</div>
        <div class="product-info" onclick="change_tab(this)">其他</div>
        <div class="long"></div>
    </div>
    <div id="tab-wrap">
        <div class="tab active">
            <article>
                <p><?php echo $info["s_introd"] ?></p>
            </article>

        </div>
        <div class="tab">
            <article>
                <p><?php echo $info["s_requirement"] ?></p>
            </article>
        </div>
        <div class="tab">
            <article>
                <p>这里是正文3</p>
            </article>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>
</body>
<script>
    function changeAmount(num){
        var amount=$("#amount-number").val();
        amount=parseInt(amount);
        if(num==0){
            return amount;
        }
        else if(num==-1){
            if(amount>1){
                if(amount==2){
                    $("#amount-minus").css({"background-color":"#f1f1f1"});
                }
                amount--;
                $("#amount-number").val(amount);
                $("#add-into-cart-input").val(amount);
                $("#buy-now-input").val(amount);
            }
            else{
                $("#amount-minus").css({"background-color":"#f1f1f1"});
                return false;
            }
        }
        else if(num==1){
            amount++;
            $("#amount-minus").css({"background-color":"#ddd"});
            $("#amount-number").val(amount);

            $("#add-into-cart-input").val(amount);
            $("#buy-now-input").val(amount);
            console.log($("#add-into-cart-input").val());
            console.log(document.getElementById('add-into-cart-input').value);
        }
    }
    function change_tab(TabObj){
        var index= $(TabObj).index();
        $(".product-info").attr("class","product-info");
        $(TabObj).attr("class","product-info active");
        $(".tab").attr("class","tab");
        $(".tab:eq("+index.toString()+")").attr("class","tab active");
    }

</script>
</html>