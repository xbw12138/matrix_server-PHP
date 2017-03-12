<?PHP
if (isset($_POST['loc'])){
	$loc=$_POST['loc'];
	$ret = file_get_contents('http://www.bitauto.com/youjia/'.$loc);
	$isMatched = preg_match_all('/oilNum">(?<grp0>[^<]+)<\/span>[\S\s]+?<strong>(?<grp1>[^<]+)<\/strong>/', $ret, $matches);
	if($isMatched!=0){
		for($i=0;$i<$isMatched;$i++){
		$array[] = array( 
			'message'=>'YES',
			'1'=>$matches[1][$i], 
			'2'=>$matches[2][$i], 
			); 
		}
	}else{
		$array[] = array( 
			'message'=>'NO', 
			); 
	}
	
	echo json_encode($array);
}else {
    $response["message"] = "NO";
    echo json_encode($response);
}
?>