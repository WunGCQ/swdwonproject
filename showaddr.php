<?php
    include("conn/conn.php");
    $ans = mysql_query("select * from address where u_id = '".$_SESSION['u_id']."'");
    $str = "";
    while($info = mysql_fetch_array($ans))
    {
         $str += "
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
    echo $str;  
?>