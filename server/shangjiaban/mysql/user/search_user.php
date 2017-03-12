<?php
$response = array();
require("../db_config.php");
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ;
mysql_query("set names 'utf8'"); 
mysql_select_db($mysql_database);
if (isset($_POST['user_phone'])) {
    $user_phone = $_POST['user_phone'];
	$sql="select ";
    $sql="select storename,storeaddress,signtime from store_information where storephone = '$user_phone'";
    if ($row=mysql_fetch_row(mysql_query($sql))) {
		$array = array( 
		'message'=>'YES',
		'storename'=>$row[0], 
		'storeaddress'=>$row[1], 
		'signtime'=>$row[2],
		); 
		echo json_encode($array);
    } else {
		$array = array( 
		'message'=>'NO',
		'success'=>0, 
		); 
        echo json_encode($array);
    }
} else {
	$array = array( 
	'message'=>'NO',
	'success'=>0, 
	); 
echo json_encode($array);
}


?>