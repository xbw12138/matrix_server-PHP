<?php
$response = array();
require("db_config.php");
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ;
mysql_query("set names 'utf8'"); 
mysql_select_db($mysql_database);
if (isset($_POST['user_name'])&&isset($_POST['user_phone'])&&isset($_POST['danmu_content'])&&isset($_POST['danmu_province'])&&isset($_POST['phonety'])) {
    $user_phone = $_POST['user_phone'];
	$user_name=$_POST['user_name'];
    $danmu_content = $_POST['danmu_content'];
    $danmu_province = $_POST['danmu_province'];	
	$phonety = $_POST['phonety'];
    $result = "INSERT INTO danmu(user_name,user_phone,danmu_content,danmu_province,phonety) VALUES('$user_name','$user_phone','$danmu_content',  '$danmu_province','$phonety')";
	mysql_query($result);
if ($result) {
		$url="http://115.159.26.120/androidapp_matrix/push/danmu.php?title=".$user_name."(".$user_phone.")"."&content=".$danmu_content;
		access_url($url);
		$urls="http://115.159.26.120/androidapp_matrix/push/danmus.php?title=".$user_name."(".$user_phone.")"."&content=".$danmu_content;
		access_url($urls);
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
