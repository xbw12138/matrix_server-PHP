<?php
$response = array();
require("db_config.php");
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ;
mysql_query("set names 'utf8'"); 
mysql_select_db($mysql_database);
if (isset($_POST['user_phone'])&&isset($_POST['page'])&&isset($_POST['province'])) {
    $user_phone = $_POST['user_phone'];
	$province = $_POST['province'];
	$page=(int)$_POST['page'];
	$rowz=mysql_fetch_row(mysql_query("select count(*) from danmu where province='$province'"));
	$num=$rowz[0]-$page*10;
	if($num>=0){
		$sql="select danmu_content,time,user_phone from danmu limit $num , 10";
		if($result=mysql_query($sql)){
			while($row=mysql_fetch_array($result)){
				$sqls="select user_name,user_image_head from user_information where user_phone='$row[2]'";
				$results=mysql_query($sqls);
				$rows=mysql_fetch_row($results);
				$array[] = array( 
				'message'=>'YES',
				'content'=>$row[0], 
				'time'=>$row[1],
				'user_head'=>$rows[1], 
				'user_name'=>$rows[0],
				); 
			}
			echo json_encode($array);
		}else {
			$array = array( 
			'message'=>'NO',
			'success'=>0, 
			); 
			echo json_encode($array);
		}
		
	}else if($num>-10){
		$jj=$num+10;
		$sql="select danmu_content,time,user_phone from danmu limit 0, $jj";
		if($result=mysql_query($sql)){
			while($row=mysql_fetch_array($result)){
				$sqls="select user_name,user_image_head from user_information where user_phone='$row[2]'";
				$results=mysql_query($sqls);
				$rows=mysql_fetch_row($results);
				$array[] = array( 
				'message'=>'YES',
				'content'=>$row[0], 
				'time'=>$row[1],
				'user_head'=>$rows[1], 
				'user_name'=>$rows[0],
				); 
			}
			echo json_encode($array);
		}else {
			$array = array( 
			'message'=>'NO',
			'success'=>0, 
			); 
			echo json_encode($array);
		}
		
	}else{
		$array[] = array( 
		'message'=>'FULL',
		'content'=>'',
		'time'=>'', 
		'user_head'=>'', 
		'user_name'=>'', 
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