<?php
	
	function send_to_user($user_content)
	{
		$content = '<html><head>
<meta charset="UTF-8">
<base target="_blank">
<style type="text/css">
::-webkit-scrollbar{ display: none; }
#divNeteaseBigAttach, #divNeteaseBigAttach_bak{display:none;}
</style>
<style type="text/css">
<!--
body, table, td, th, div, ul, li, p{font-family:"宋体", Arial!important;font-size:14px;line-height:30px;}
#dangdang_box{font-size:12px;}
#dangdang_box a:link,#dangdang_box a:visited{color:#1a66b3;text-decoration:none;}
#dangdang_box a:hover,#dangdang_box a:active{color:#1a66b3;text-decoration:underline;}
#dangdang_box img{ border:0}
#dangdang_box td,#dangdang_box td font,#dangdang_box td font b{line-height:30px;}
-->

--></style>


</head><body><div id="dangdang_box">
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0" style="color:#999;font:12px \'宋体\';">
  <tbody><tr>
    <td bgcolor="#f3f3f3">
    <table width="590" border="0" align="center" cellpadding="0" cellspacing="0" style="color:#555;font:14px/30px \'宋体\';">
      <tbody><tr>
        <td><p style="line-height:16px; margin:15px 0;"><br><b>尊敬的&nbsp;'.$user_content[0].'&nbsp;您好！</b>感谢您在思维特软件商店购物（<a target="_blank" href="http://www.dangdang.com" style="color:#1a66b3;">dangdang.com</a>）购物！</p>您于<b>'.$user_content[1].'</b>提交的订单<font style="color:#1a66b3;"><b>'.$user_content[2].'</b></font>，我们已收到，将会及时为您处理。<br>
      </td>
      </tr>
      <tr>
        <td height="30"></td>
      </tr>
    </tbody></table>
    <table width="620" border="0" align="center" cellpadding="0" cellspacing="0">
      <tbody><tr>
        <td height="9" bgcolor="#f47920"></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFFFFF" style="padding-bottom:20px;">
          <table width="590" border="0" align="center" cellpadding="0" cellspacing="0" style="color:#333;font-size:14px;line-height:30px;">
            <tbody><tr>
              <td height="68" colspan="4" valign="middle"><font color="#f47920"><b>订单信息</b></font></td>
              </tr>
            <tr>
              <td width="85" valign="top"><font color="#999"><b>收货人：</b></font></td>
              <td valign="top">'.$user_content[3].'</td>
              <td width="85" rowspan="4" valign="top"><font color="#999"><b></b></font></td>
              <td width="196" rowspan="4" valign="top"></td>
              </tr>
            <tr valign="top">
              <td><font color="#999"><b>联系方式：</b></font></td>
              <td width="224">'.$user_content[4].'</td>
              </tr>
            <tr valign="top">
              <td><font color="#999"><b>收货地址</b></font></td>
              <td width="224">'.$user_content[5].'</td>
              </tr>
            <tr valign="top">
              <td><font color="#999"><b>订单金额：</b></font></td>
              <td width="224"><font color="#f47920"><b>￥'.$user_content[7].'</b></font></td>
              </tr>
          </tbody></table>
        </td>
      </tr>
    </tbody></table>
    <table width="620" border="0" align="center" cellpadding="0" cellspacing="0">
      <tbody><tr>
        <td height="2" bgcolor="#f4eed9"></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#fdf9e7">
          <table width="590" border="0" align="center" cellpadding="0" cellspacing="0" style="color:#666;font-size:14px;line-height:30px;">
            <tbody><tr>
              <td width="309" height="50" valign="middle"><font color="#f47920"><b>商品清单</b></font></td>
            </tr>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                  <td width="590" bgcolor="#f5efd3"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px dashed #d0c079;color:#666">
                    <tbody><tr>
                      <td width="326" height="30" align="center" valign="middle">软件名称</td>
                      <td width="89" align="left" valign="middle">价格</td>
                      <td width="82" align="left" valign="middle">订购数量</td>
                      <td width="93" align="left" valign="middle">小计</td>
                      </tr>
                    </tbody></table></td>
                  </tr>
                        <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px dashed #d0c079;">
                    <tbody>';

                    $len = count($user_content[6]);
                    for($i = 0;$i < $len;$i++)
                    {
                    	$content = $content.' <tr>
                      <td width="301" height="34" align="left" valign="middle" style="padding-right:25px;"><a target="_blank" href="'.$domain.'product.php?s_id='.$user_content[6][$i]["s_id"].'" style="color:#1a66b3;">'.$user_content[6][$i]["s_name"].'</a></td>
                      <td width="89" align="left" valign="middle">￥'.$user_content[6][$i]["s_price"].'</td>
                      <td width="82" align="left" valign="middle">'.$user_content[6][$i]["s_amount"].'</td>
                      <td width="93" align="left" valign="middle">￥'.($user_content[6][$i]["s_price"]*$user_content[6][$i]["s_amount"]).'</td>
                      </tr>';
                    }
                    $content = $content.'</tbody></table></td>
                  </tr>
                        </tbody></table></td>
            </tr>
          </tbody></table>
        </td>
      </tr>
      <tr>
        <td height="50" bgcolor="#fdf9e7"></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#f3f3f3" style="background:#f3f3f3 url(images/bg_line.gif) repeat-x 0 0"></td>
      </tr>
    </tbody></table>
    
    </td>
  </tr>
  
  
  
  
  
  <tr>
    <td height="30" align="center" valign="middle" style="font-size:12px;">Copyright (C) 思维特软件商店 2013-2014, All Rights Reserved</td>
  </tr>
</tbody></table>
</div>


<div style="display:none;">
  <img src="http://emailsys.reco.dangdang.com//1px.php?event_id=8006&amp;msg_id=306595251&amp;sent_time=2014-03-02&amp;customer_email=buaa1121wxp%40163.com&amp;tablename=msg_cs_queue&amp;customer_id=0" style="width:0px;height:0px;">
</div> 

<style type="text/css">
body{font-size:14px;font-family:arial,verdana,sans-serif;line-height:1.666;padding:0;margin:0;overflow:auto;white-space:normal;word-wrap:break-word;min-height:100px}
td, input, button, select, body{font-family:Helvetica, \'Microsoft Yahei\', verdana}
pre {white-space:pre-wrap;white-space:-moz-pre-wrap;white-space:-pre-wrap;white-space:-o-pre-wrap;word-wrap:break-word}
th,td{font-family:arial,verdana,sans-serif;line-height:1.666}
img{ border:0}
header,footer,section,aside,article,nav,hgroup,figure,figcaption{display:block}
</style>

<style id="ntes_link_color" type="text/css">a,td a{color:#064977}</style></body></html>';

	return $content;
	}


	function send_to_admin($admin_content)
	{
		$content = '<html><head>
<meta charset="UTF-8">
<base target="_blank">
<style type="text/css">
::-webkit-scrollbar{ display: none; }
#divNeteaseBigAttach, #divNeteaseBigAttach_bak{display:none;}
</style>
<style type="text/css">
<!--
body, table, td, th, div, ul, li, p{font-family:"宋体", Arial!important;font-size:14px;line-height:30px;}
#dangdang_box{font-size:12px;}
#dangdang_box a:link,#dangdang_box a:visited{color:#1a66b3;text-decoration:none;}
#dangdang_box a:hover,#dangdang_box a:active{color:#1a66b3;text-decoration:underline;}
#dangdang_box img{ border:0}
#dangdang_box td,#dangdang_box td font,#dangdang_box td font b{line-height:30px;}
-->

--></style>


</head><body><div id="dangdang_box">
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0" style="color:#999;font:12px \'宋体\';">
  <tbody><tr>
    <td bgcolor="#f3f3f3">
    <table width="590" border="0" align="center" cellpadding="0" cellspacing="0" style="color:#555;font:14px/30px \'宋体\';">
      <tbody><tr>
        <td><p style="line-height:16px; margin:15px 0;"><br><b>尊敬的&nbsp;'.$admin_content[0].'&nbsp;您好！</b>感谢您在思维特软件商店购物（<a target="_blank" href="http://www.dangdang.com" style="color:#1a66b3;">dangdang.com</a>）购物！</p>您于<b>'.$admin_content[1].'</b>提交的订单<font style="color:#1a66b3;"><b>'.$admin_content[2].'</b></font>，我们已收到，将会及时为您处理。<br>
      </td>
      </tr>
      <tr>
        <td height="30"></td>
      </tr>
    </tbody></table>
    <table width="620" border="0" align="center" cellpadding="0" cellspacing="0">
      <tbody><tr>
        <td height="9" bgcolor="#f47920"></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFFFFF" style="padding-bottom:20px;">
          <table width="590" border="0" align="center" cellpadding="0" cellspacing="0" style="color:#333;font-size:14px;line-height:30px;">
            <tbody><tr>
              <td height="68" colspan="4" valign="middle"><font color="#f47920"><b>订单信息</b></font></td>
              </tr>
            <tr>
              <td width="85" valign="top"><font color="#999"><b>收货人：</b></font></td>
              <td valign="top">'.$admin_content[3].'</td>
              <td width="85" rowspan="4" valign="top"><font color="#999"><b></b></font></td>
              <td width="196" rowspan="4" valign="top"></td>
              </tr>
            <tr valign="top">
              <td><font color="#999"><b>联系方式：</b></font></td>
              <td width="224">'.$admin_content[4].'</td>
              </tr>
            <tr valign="top">
              <td><font color="#999"><b>收货地址</b></font></td>
              <td width="224">'.$admin_content[5].'</td>
              </tr>
            <tr valign="top">
              <td><font color="#999"><b>订单金额：</b></font></td>
              <td width="224"><font color="#f47920"><b>￥'.$admin_content[7].'</b></font></td>
              </tr>
          </tbody></table>
        </td>
      </tr>
    </tbody></table>
    <table width="620" border="0" align="center" cellpadding="0" cellspacing="0">
      <tbody><tr>
        <td height="2" bgcolor="#f4eed9"></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#fdf9e7">
          <table width="590" border="0" align="center" cellpadding="0" cellspacing="0" style="color:#666;font-size:14px;line-height:30px;">
            <tbody><tr>
              <td width="309" height="50" valign="middle"><font color="#f47920"><b>商品清单</b></font></td>
            </tr>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                  <td width="590" bgcolor="#f5efd3"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px dashed #d0c079;color:#666">
                    <tbody><tr>
                      <td width="326" height="30" align="center" valign="middle">软件名称</td>
                      <td width="89" align="left" valign="middle">价格</td>
                      <td width="82" align="left" valign="middle">订购数量</td>
                      <td width="93" align="left" valign="middle">小计</td>
                      </tr>
                    </tbody></table></td>
                  </tr>
                        <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px dashed #d0c079;">
                    <tbody>';

                    $len = count($admin_content[6]);
                    for($i = 0;$i < $len;$i++)
                    {
                    	$content = $content.' <tr>
                      <td width="301" height="34" align="left" valign="middle" style="padding-right:25px;"><a target="_blank" href="'.$domain.'product.php?s_id='.$admin_content[6][$i]["s_id"].'" style="color:#1a66b3;">'.$admin_content[6][$i]["s_name"].'</a></td>
                      <td width="89" align="left" valign="middle">￥'.$admin_content[6][$i]["s_price"].'</td>
                      <td width="82" align="left" valign="middle">'.$admin_content[6][$i]["s_amount"].'</td>
                      <td width="93" align="left" valign="middle">￥'.($admin_content[6][$i]["s_price"]*$admin_content[6][$i]["s_amount"]).'</td>
                      </tr>';
                    }
                    $content = $content.'<table width="590" border="0" align="center" cellpadding="0" cellspacing="0" style="color:#666;font-size:14px;line-height:30px;">
            <tbody><tr>
              <td width="309" height="50" valign="middle"><font color="#f47920"><b>商品清单</b></font></td>
            </tr>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                  <td width="590" bgcolor="#f5efd3"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px dashed #d0c079;color:#666">
                    <tbody><tr>
                      <td width="326" height="30" align="center" valign="middle">序列号</td>
                      <td width="200" align="left" valign="middle">软件产品</td>
                      </tr>
                    </tbody></table></td>
                  </tr>
                        <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px dashed #d0c079;">
                    <tbody>';

                    $len = count($admin_content[8]);
                    for($i = 0;$i < $len;$i++)
                    {
                    	$slist = $admin_content[8][$i];
                    	$lenj = count($slist);
                    	for($j = 0;$j < $lenj;$j++)
                    	{
                    		$content = $content.' <tr>
                      <td width="301" height="34" align="left" valign="middle" style="padding-right:25px;">'.$slist[$j].'</a></td>
                      <td width="200" align="left" valign="middle">￥'.$admin_content[6][$i]["s_name"].'</td>
                      </tr>';
                    	} 	
                    }

                    $content = $content.'</tbody></table></td>
                  </tr>
                        </tbody></table></td>
            </tr>
          </tbody></table>
        </td>
      </tr>
      <tr>
        <td height="50" bgcolor="#fdf9e7"></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#f3f3f3" style="background:#f3f3f3 url(images/bg_line.gif) repeat-x 0 0"></td>
      </tr>
    </tbody></table>
    
    </td>
  </tr>
  
  
  
  
  
  <tr>
    <td height="30" align="center" valign="middle" style="font-size:12px;">Copyright (C) 思维特软件商店 2013-2014, All Rights Reserved</td>
  </tr>
</tbody></table>
</div>


<div style="display:none;">
  <img src="http://emailsys.reco.dangdang.com//1px.php?event_id=8006&amp;msg_id=306595251&amp;sent_time=2014-03-02&amp;customer_email=buaa1121wxp%40163.com&amp;tablename=msg_cs_queue&amp;customer_id=0" style="width:0px;height:0px;">
</div> 

<style type="text/css">
body{font-size:14px;font-family:arial,verdana,sans-serif;line-height:1.666;padding:0;margin:0;overflow:auto;white-space:normal;word-wrap:break-word;min-height:100px}
td, input, button, select, body{font-family:Helvetica, \'Microsoft Yahei\', verdana}
pre {white-space:pre-wrap;white-space:-moz-pre-wrap;white-space:-pre-wrap;white-space:-o-pre-wrap;word-wrap:break-word}
th,td{font-family:arial,verdana,sans-serif;line-height:1.666}
img{ border:0}
header,footer,section,aside,article,nav,hgroup,figure,figcaption{display:block}
</style>

<style id="ntes_link_color" type="text/css">a,td a{color:#064977}</style></body></html>';

	return $content;
	}
?>