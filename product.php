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
    <link rel="stylesheet" type="text/css" href="css/product.css"/>
 	
<style id="style-1-cropbar-clipper">/* Copyright 2014 Evernote Corporation. All rights reserved. */
    /*    
.en-markup-crop-options {
    top: 18px !important;
    left: 50% !important;
    margin-left: -100px !important;
    width: 200px !important;
    border: 2px rgba(255,255,255,.38) solid !important;
    border-radius: 4px !important;
}

.en-markup-crop-options div div:first-of-type {
    margin-left: 0px !important;
    }*/
</style>
</head>
<body>
<?php include("header.php"); ?>
<div id="brief-info">
    <div id="brief-info-content">
        <div id="brief-info-images" >
            <?php echo "<img src='".$info["s_imagepath"]."'>" ?>
        </div>
        <div id="brief-info-text">
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
        <!--div class="product-info" onclick="change_tab(this)">其他</div-->
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