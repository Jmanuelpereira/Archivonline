<?php
 if (!isset($_SESSION)) {
  session_start();
}
?>
<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_archivo = "mysql.hostinger.co";
$database_archivo = "u874513862_arch";
$username_archivo = "u874513862_adm";
$password_archivo = "11051.jm";
$archivo = mysql_pconnect($hostname_archivo, $username_archivo, $password_archivo) or trigger_error(mysql_error(),E_USER_ERROR); 
?>

