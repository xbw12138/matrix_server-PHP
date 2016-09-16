<?php
$response = array();
require("../db_config.php");
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ;
mysql_query("set names 'utf8'"); 
mysql_select_db($mysql_database);
if (isset($_POST['user_phone'])) {
    $user_phone = $_POST['user_phone'];
    $sql="select     gas_num,gas_station,gas_type,order_time,is_finish,order_id,send_time,order_name,order_phone,money,ispay from     order_information where user_phone='$user_phone' and ispay like 'N'";
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
			'ispay'=>$row[10],
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
				'ispay'=>'',
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