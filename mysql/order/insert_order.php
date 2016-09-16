<?php
$response = array();
ini_set("error_reporting","E_ALL & ~E_NOTICE"); 
require("../db_config.php");
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ;
mysql_query("set names 'utf8'"); 
mysql_select_db($mysql_database);
if (isset($_POST['user_phone']) && isset($_POST['order_time'])&&isset($_POST['gas_station'])&&isset($_POST['gas_type'])&&isset($_POST['gas_num'])&&isset($_POST['send_time'])&&isset($_POST['order_phone'])&&isset($_POST['order_name'])&&isset($_POST['money'])) {
    $user_phone = $_POST['user_phone'];
    $order_time = $_POST['order_time'];
    $gas_station = $_POST['gas_station'];	
    $gas_type = $_POST['gas_type'];
    $gas_num = $_POST['gas_num'];
    $send_time = $_POST['send_time'];
	$order_name = $_POST['order_name'];
	$order_phone = $_POST['order_phone'];
	$money = $_POST['money'];
    $url="http://115.159.26.120/androidapp_matrix/qr/finish.php?user_phone=".$user_phone."&send_time=".$send_time;
    $result = "INSERT INTO order_information(user_phone, order_time, gas_station,gas_type,gas_num,send_time,url,order_name,order_phone,money) VALUES('$user_phone', '$order_time', '$gas_station', '$gas_type', '$gas_num', '$send_time','$url','$order_name','$order_phone','$money')";
mysql_query($result);
if ($result) {
	    $sqls="select storetoken from store_information where storeaddress='$gas_station'";
		$rows = mysql_fetch_array(mysql_query($sqls));
		$url="http://115.159.26.120/androidapp_matrix/push/order.php?token=".$rows[0];
		access_url($url);
		//$array = array( 
		//	'message'=>'YES',
		//	'success'=>0, 
		//); 
		//echo json_encode($array);
        $response["success"] = 1;
        $response["message"] = "YES";
        echo json_encode($response);
    } else {
        $response["success"] = 0;
        $response["message"] = "NO";
        echo json_encode($response);
    }
} else {
    $response["success"] = 0;
    $response["message"] = "NO";
    echo json_encode($response);
}

function access_url($url) {  
    if ($url=='') return false;  
    $fp = fopen($url, 'r') or exit('Open url faild!');  
    if($fp){
    while(!feof($fp)) {  
        $file.=fPOSTs($fp)."";
    }
    fclose($fp);  
    }
    return $file;
}

?>
