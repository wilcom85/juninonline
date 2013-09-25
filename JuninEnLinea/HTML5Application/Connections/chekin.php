<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_chekin = "localhost";
$database_chekin = "checkin";
$username_chekin = "root";
$password_chekin = "80378556";
$chekin = mysql_pconnect($hostname_chekin, $username_chekin, $password_chekin) or trigger_error(mysql_error(),E_USER_ERROR); 
?>