<?php
	include("conn/conn.php");
	include("function.php");
	$arr = json_decode($_POST['jsonstr'],true);

	$total = 0;
	$goods = $arr["products"];
	$len = count($goods);
	for($i=0; $i<$len; $i++)
	{
		$query = mysql_query("select COUNT(*) as cnt from s_number where sn_issale = '0' and s_id = '".$goods[0]["s_id"]."'",$conn);
		$res = mysql_fetch_array($query);
		if(!$res){ echo "error"; exit; }

		if($goods[0]["s_amount"] > $res["cnt"])
		{
			echo $goods[0]["s_name"];
			exit;
		}
		$total = $goods[0]["s_price"] + $goods[0]["s_amount"];
	}

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
		$sql = "insert into orders(o_id,a_id,o_time,o_total) values('".$o_id."','".$o_time."','".$total."')";
	}
	$query = mysql_query($sql,$conn);
	if(!$query){
		echo "error";
		exit;
	}

	for($i=0; $i < $len;$i++)
	{
		$s_id = $arr["products"][0]["s_id"];
		$g_amount = $arr["products"][0]["s_amount"];
		$sql = "insert into goods(s_id,g_amount,o_id) values('".$s_id."','".$g_amount."','".$o_id."')";
		$query = mysql_query($sql,$conn);
		if(!$query){ echo "error"; exit; }
	}

	$to = "buaa1121wxp@163.com";
	$subject = "思维特软件商店-新订单来了";
	$body = "新订单,哈哈";
	if(!sendEmails($to,$subject,$body))
	{
		echo "mail error";
		exit;
	}	

	//给用户发邮件
	echo "success";
?>