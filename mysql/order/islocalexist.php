<?php
$response = array();
require("../db_config.php");
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ;
mysql_query("set names 'utf8'"); 
mysql_select_db($mysql_database);
if (isset($_POST['local'])) {
$local = $_POST['local'];
$sql="select * from store_information where storeaddress='$local'";
$result = mysql_query($sql);
$data = mysql_num_rows($result);
if ($data){
        $response["success"] = 1;
        $response["message"] = "YES";
        echo json_encode($response);
}
else{
	$response["success"] = 0;
        $response["message"] = "NO";
        echo json_encode($response);
}

}else {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
    echo json_encode($response);
}









?>