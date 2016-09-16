<?php
$response = array();
require("db_config.php");
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) 

or die("error connecting") ;
mysql_query("set names 'utf8'"); 
mysql_select_db($mysql_database);

if (isset($_GET['user_phone']) && isset($_GET['send_time'])&& isset($_GET['shangjia'])) {
    $user_phone = $_GET['user_phone'];
    $send_time = $_GET['send_time'];
	$shangjia = $_GET['shangjia'];
	$url="http://115.159.26.120/androidapp_matrix/qr/finish.php?user_phone=".$user_phone."&send_time=".$send_time;
	$sqls="select is_finish from order_information where url='$url'";
	$rows = mysql_fetch_array(mysql_query($sqls));
	
	if($rows[0]=='N'){
		$sql="update order_information set is_finish='Y' where url='$url'";
		$result=mysql_query($sql);
		if ($result) {
				$sqlx="select gas_station,gas_type,gas_num,order_time,send_time,order_name,order_phone from order_information where url='$url'";
				$resultx=mysql_query($sqlx);
				if ($rowx=mysql_fetch_row($resultx)) {
					$array = array( 
						'5'=>"预约人  ：    ".$rowx[5], 
						'6'=>"手机号  ：    ".$rowx[6], 
						'3'=>"预约时间：    ".$rowx[3], 
						'0'=>"加油地点：    ".$rowx[0], 
						'1'=>"加油类型：    ".$rowx[1], 
						'2'=>"加油数量：    ".$rowx[2],
						'4'=>"发布时间：    ".$rowx[4], 
						
					); 
					echo "<BR>"."<BR>";
			
					foreach($array as $a){
						echo $a."<BR>";
					}
					
				}else {
					echo "<center>";
					echo "<BR>"."<BR>"."获取数据失败"."<BR>";
					echo "</center>";
				}
				
				
		} else {
				echo "<center>";
				echo "<BR>"."<BR>"."加油失败"."<BR>";
				echo "</center>";
		}
	}else{
		echo "<center>";
		echo "<BR>"."<BR>"."加油已成功，二维码失效"."<BR>";
		echo "</center>";
	}
    
} else {
    echo "<center>";
	echo "<BR>"."<BR>"."传入非法参数"."<BR>";
	echo "</center>";
}





?>