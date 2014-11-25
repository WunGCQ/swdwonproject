<?php
	
	$_SESSION["cart"] = array();
	unset($_SESSION["cart"]);

	include("conn/conn.php");
	include("function.php");
	$arr = json_decode($_POST['jsonstr'],true);

	//遍历订单，测试是否有超出库存的
	$total = 0;
	$goods = $arr["products"];
	$len = count($goods);
	for($i=0; $i<$len; $i++)
	{
		$query = mysql_query("select COUNT(*) as cnt from s_number where sn_issale = '0' and s_id = '".$goods[$i]["s_id"]."'",$conn);
		$res = mysql_fetch_array($query);
		if(!$res){ echo "database error"; exit; }

		if($goods[$i]["s_amount"] > $res["cnt"])
		{
			echo $goods[$i]["s_name"];
			exit;
		}
		$total += $goods[$i]["s_price"] * $goods[$i]["s_amount"];
	}
	//生成订单，将订单写入数据库
	$o_time = time();
	$a_id = $arr["addr_id"];
	$sql = "";
	$o_id = prodorderId();

	if($arr["user_id"] != -1)
	{
		$sql = "insert into orders(o_id,u_id,a_id,o_time,o_total) values('".$o_id."','".$arr['user_id']."','".$a_id."','".$o_time."','".$total."')";
	}
	else
	{
		$sql = "insert into orders(o_id,a_id,o_time,o_total) values('".$o_id."','".$a_id."','".$o_time."','".$total."')";
	}

	$query = mysql_query($sql,$conn);
	if(!$query){
		echo "orders table error";
		exit;
	}

	//将商品写入数据库
	$s_number = array();
	for($i=0; $i < $len;$i++)
	{
		$slist = array();

		$s_id = $goods[0]["s_id"];
		$g_amount = $goods[0]["s_amount"];
		$sql = "insert into goods(s_id,g_amount,o_id) values('".$s_id."','".$g_amount."','".$o_id."')";
		$query = mysql_query($sql,$conn);
		if(!$query){ echo "goods table error"; exit; }

		//取出序列号码，更新数据库
		$j = 0;
		$query = mysql_query("select sn_id,sn_number from s_number where sn_issale = '0' limit ".$g_amount);
		while($info = mysql_fetch_array($query))
		{
			$slist[$j] = $info["sn_number"];
			$res = mysql_query("update s_number set sn_issale = '1' where sn_id = '".$info["sn_id"]."'");
			if(!$res){ echo "s_number table error"; exit; }
			$j = $j + 1;
		}
		$s_number[$i] = $slist;
	}

	//下单用户信息
	$username = "未注册用户";
	$user_email = "";
	$user_status = "";
	if($arr["user_id"] != -1)
	{
		$an = mysql_query("select * from user where u_id = '".$arr["user_id"]."'");
		$ans = mysql_fetch_array($an);
		$username = $ans["u_name"];
		$user_email = $ans["u_email"];
		$user_status = $ans["u_status"];
	}

	//订单地址
	$query_addr = mysql_query("select * from address where a_id = '".$arr["addr_id"]."'");
	$address = mysql_fetch_array($query_addr);
	$a_name = $address["a_name"];
	$a_address = $address["a_address"];
	$a_telephone = $address["a_telephone"];
	//商品名称  goods[$i]["s_name"]
	//商品数量  goods[$i]["s_amount"]
	//$len goods的大小

	//$o_id  订单号
	//$o_time 时间
	$user_content = array();
	$admin_content = array();

	$user_content[0] = $user_name;
	$user_content[1] = $o_time;
	$user_content[2] = $o_id;
	$user_content[3] = $a_name;
	$user_content[4] = $a_telephone;
	$user_content[5] = $a_address;
	$user_content[6] = $goods;
	$user_content[7] = $total;

	$admin_content[0] = "网站管理员";
	$admin_content[1] = $o_time;
	$admin_content[2] = $o_id;
	$admin_content[3] = $a_name;
	$admin_content[4] = $a_telephone;
	$admin_content[5] = $a_address;
	$admin_content[6] = $goods;
	$admin_content[7] = $total;
	$admin_content[8] = $s_number;

	//用户订单通知
	include("prodHtmlEmail.php");
	include("readconfig.php");

	if($arr["user_id"] != -1 && $user_status == 1)
	{
		$to = $user_email;
		$subject = "订单通知";
		$body = send_to_user($user_content);

		if(!sendEmails($mail,$to,$subject,$body,$semail,$semail_password))
		{
			echo "mail error";
			exit;
		}	
	}
	//echo "user";

	//管理员订单通知
	$to = $remail;
	$subject = "新订单通知";
	$body = send_to_admin($admin_content);

	if(!sendEmails($mail,$to,$subject,$body,$semail,$semail_password))
	{
		echo "mail error";
		exit;
	}
	echo "success";
?>