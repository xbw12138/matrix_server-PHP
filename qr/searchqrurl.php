<?php
$response = array();
require("db_config.php");
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) 

or die("error connecting") ;
mysql_query("set names 'utf8'"); 
mysql_select_db($mysql_database);


if (isset($_POST['order_id'])) {
	$order_id = (int)$_POST['order_id'];
	$sql="select url from order_information where order_id='$order_id'";
	if($row = mysql_fetch_row(mysql_query($sql))){
		$array = array( 
		'message'=>'YES',
		'url'=>$row[0],
		);
		echo json_encode($array);
	}else {
		$array = array( 
		'message'=>'NO',
		'success'=>0, 
		); 
        echo json_encode($array);
    }
}else {
	$array = array( 
	'message'=>'NO',
	'success'=>0, 
	); 
	echo json_encode($array);
}










?>