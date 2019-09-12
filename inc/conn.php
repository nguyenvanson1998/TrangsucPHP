<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_cnn = "localhost";
$database_cnn = "quynh";
$username_cnn = "root";
$password_cnn = "";
$conn = mysql_connect($hostname_cnn, $username_cnn, $password_cnn) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_cnn, $conn); 
?>