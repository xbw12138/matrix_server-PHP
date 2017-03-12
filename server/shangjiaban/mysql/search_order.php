<?php
$response = array();
//$array = array('message'=>'YES',);
require("db_config.php");
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ;
mysql_query("set names 'utf8'"); 
mysql_select_db($mysql_database);
if (isset($_POST['user_phone'])) {
    $user_phone = $_POST['user_phone'];
	$sqla="select storeaddress from store_information where storephone='$user_phone'";
	if($rowa=mysql_fetch_row(mysql_query($sqla))){
		$sql="select gas_num,gas_station,gas_type,order_time,is_finish,order_id,send_time,order_name,order_phone,money from order_information where gas_station='$rowa[0]' and is_finish='N' and ispay='N'";
		$result=mysql_query($sql);
		if(mysql_num_rows($result) > 0){
			while($row=mysql_fetch_array($result)){
				$array[] = array( 
				'message'=>'YES',
				'gas_num'=>$row[0], 
				'gas_station'=>$row[1], 
				'gas_type'=>$row[2],
				'order_time'=>$row[3], 
				'is_finish'=>$row[4], 
				'order_id'=>$row[5],
				'send_time'=>$row[6],
				'order_name'=>$row[7],
				'order_phone'=>$row[8],
				'money'=>$row[9],
				); 
			}
			echo json_encode($array);
		}else {
			$array[] = array( 
				'message'=>'NO',
				'gas_num'=>'', 
				'gas_station'=>'', 
				'gas_type'=>'',
				'order_time'=>'', 
				'is_finish'=>'', 
				'order_id'=>'',
				'send_time'=>'',
				'order_name'=>'',
				'order_phone'=>'',
				'money'=>'',
				); 
			echo json_encode($array);
		}
	}
} else {
	$array = array( 
	'message'=>'Required field(s) is missing',
	'success'=>0, 
	); 
	echo json_encode($array);
}


?>