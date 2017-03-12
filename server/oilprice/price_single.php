<?PHP
require("db_config.php");
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ;
mysql_query("set names 'utf8'"); 
mysql_select_db($mysql_database);
$response=array();
if (isset($_POST['loc'])){
	$loc=$_POST['loc'];
	$sql="select url,city from local where city like '%$loc%'";
	$open=1;
	if($result=mysql_query($sql)){
		while($rowz=mysql_fetch_array($result))
		{
			$open=0;
			$ret = file_get_contents($rowz[0]);
				$isMatched = preg_match_all('/oilNum">(?<grp0>[^<]+)<\/span>[\S\s]+?<strong>(?<grp1>[^<]+)<\/strong>/', $ret, $matches);
				$xu=array();
				if($isMatched!=0){
					for($i=0;$i<$isMatched;$i++){
						$xu[$i]=$matches[2][$i];
					}
					$array[] = array( 
					'message'=>'YES',
					'url'=>$rowz[0], 
					'city'=>$rowz[1], 
					'oil90'=>$xu[0],
					'oil93'=>$xu[1],
					'oil97'=>$xu[2],
					'oil0'=>$xu[3],
					); 
				}else{
					$array = array( 
					'message'=>'NO', 
					); 
				
				}	
		}
		if($open==1){
			$array[] = array( 
				'message'=>'NO', 
				'url'=>'', 
					'city'=>'', 
					'oil90'=>'',
					'oil93'=>'',
					'oil97'=>'',
					'oil0'=>'',
				); 
		}
		echo json_encode($array);
	}else {
		$array = array( 
				'message'=>'NO', 
				); 
		echo json_encode($array);
	}
	
}else {
    $response["message"] = "NO";
    echo json_encode($response);
}
?>