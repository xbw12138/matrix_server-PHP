<?php
$response = array();
require("../db_config.php");
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ;
mysql_query("set names 'utf8'"); 
mysql_select_db($mysql_database);
if (isset($_POST['user_phone']) && isset($_POST['light'])&&isset($_POST['shiftstate'])&&isset($_POST['enginestate'])&&isset($_POST['oilcount'])&&isset($_POST['colometer'])&&isset($_POST['carlevel'])&&isset($_POST['enginenum'])&&isset($_POST['platenum'])&&isset($_POST['logo'])&&isset($_POST['brand'])&&isset($_POST['send_time'])&&isset($_POST['model'])) {
    $user_phone = $_POST['user_phone'];
    $light = $_POST['light'];
    $shiftstate = $_POST['shiftstate'];	
    $enginestate = $_POST['enginestate'];
    $oilcount = $_POST['oilcount'];
    $colometer = $_POST['colometer'];
    $carlevel = $_POST['carlevel'];
    $enginenum = $_POST['enginenum'];	
    $platenum = $_POST['platenum'];
    $logo = $_POST['logo'];
    $brand = $_POST['brand'];
    $send_time = $_POST['send_time'];
    $model = $_POST['model'];
    $result = "INSERT INTO keep_information(user_phone, light, shiftstate,enginestate,oilcount,colometer,carlevel,enginenum,platenum,logo,brand,send_time,model) VALUES('$user_phone', '$light', '$shiftstate', '$enginestate', '$oilcount', '$colometer', '$carlevel', '$enginenum', '$platenum', '$logo', '$brand', '$send_time','$model')";
mysql_query($result);
if ($result) {
		$sqls="select user_token from user_information where user_phone='$user_phone'";
		$rows = mysql_fetch_array(mysql_query($sqls));
		if(strcmp($oilcount, '20%')<0){
			$url="http://115.159.26.120/androidapp_matrix/push/demo.php?id=1&token=".$rows[0];
			access_url($url);
		}
		preg_match('|(＼d+)|',$colometer,$r);
		if($r%15000==0&&$r>0){
			$url="http://115.159.26.120/androidapp_matrix/push/demo.php?id=2&token=".$rows[0];
			access_url($url);
			
		}
		if(strcmp($light,'故障')==0){
			$url="http://115.159.26.120/androidapp_matrix/push/demo.php?id=3&token=".$rows[0];
			access_url($url);
		}
		if(strcmp($shiftstate,'差')==0){
			$url="http://115.159.26.120/androidapp_matrix/push/demo.php?id=4&token=".$rows[0];
			access_url($url);
		}
		if(strcmp($enginestate,'差')==0){
			$url="http://115.159.26.120/androidapp_matrix/push/demo.php?id=5&token=".$rows[0];
			access_url($url);
		}
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
        $file.=fgets($fp)."";
    }
    fclose($fp);  
    }
    return $file;
}
?>
