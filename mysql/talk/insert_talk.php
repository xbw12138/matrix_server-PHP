<?php
$response = array();
require("../db_config.php");
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ;
mysql_query("set names 'utf8'"); 
mysql_select_db($mysql_database);
if (isset($_POST['user_phone'])&&isset($_POST['danmu_content'])&&isset($_POST['talk_ty'])&&isset($_POST['danmu_province'])) {
    $user_phone = $_POST['user_phone'];
    $danmu_content = $_POST['danmu_content'];
	$talk_ty = $_POST['talk_ty'];
	$danmu_province=$_POST['danmu_province'];
    $result = "INSERT INTO danmu(user_phone,danmu_content,phonety,danmu_province) VALUES('$user_phone',  '$danmu_content', '$talk_ty','$danmu_province')";
mysql_query($result);
if ($result) {
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

?>
