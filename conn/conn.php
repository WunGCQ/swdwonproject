<?php
    $conn = mysql_connect("127.0.0.1","root","root") or die("数据库服务器连接错误".mysql_error());
    mysql_select_db("data",$conn) or die("数据库访问错误".mysql_error());
    mysql_query("set names utf-8");
?>