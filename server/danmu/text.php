<?php
$response = array();
require("db_config.php");
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ;
mysql_query("set names 'utf8'"); 
mysql_select_db($mysql_database);
if (isset($_GET['province'])) {
	$province = $_GET['province'];
	$rowz=mysql_fetch_row(mysql_query("select count(*) from order_information where user_phone='$province' "));
	echo $rowz[0];
	//$num=$rowz[0]-$page*10;
}
?>