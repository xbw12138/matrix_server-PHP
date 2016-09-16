<?php
$response = array();
require("db_config.php");
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ;
mysql_query("set names 'utf8'"); 
mysql_select_db($mysql_database);
if (isset($_POST['user_phone']) && isset($_POST['user_password'])&& isset($_POST['user_loc'])) {
    $user_phone = $_POST['user_phone'];
    $user_password = $_POST['user_password'];
	$user_loc = $_POST['user_loc'];	
    $result = "INSERT INTO store_information(storephone, password,storeaddress ) VALUES('$user_phone', '$user_password', '$user_loc')";
    //$results = "INSERT INTO order_information(user_phone) VALUES('$user_phone')";
    //$resultss = "INSERT INTO keep_information(user_phone) VALUES('$user_phone')";
mysql_query($result);
//mysql_query($results);
//mysql_query($resultss);
if ($result){//&&$results&&$resultss) {
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
    $response["message"] = "Required field(s) is missing";
    echo json_encode($response);
}

?>
