<?php
	include("conn/conn.php");

	$query = mysql_query("select * from software where s_cate = 1 order by s_datetime desc",$conn);
	if(!$query)	echo "<script>alert('数据库查询错误');</script>";  
	while($info = mysql_fetch_array($query))
	{
		echo "<div class=\"commodity\">
                <div class=\"commodity-pic\">
                    <a href=\"product.php?s_id=".$info["s_id"]."\" target=\"_blank\">
                    <img src=\"".$info["s_imagepath"]."\" alt=\"".$info["s_name"]."\"/>
                    </a>
                </div>
                <div class=\"commodity-info\">
                    <span class=\"commodity-title\">".$info["s_name"]."</span>
                    <span class=\"commodity-price\">".$info["s_price"]."</span>
                </div>
            </div>";
	}
?>