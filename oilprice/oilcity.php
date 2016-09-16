<?php
$str = file_get_contents('http://www.bitauto.com/youjia/');
$isMatched = preg_match_all('/<a href="(?<grp0>[^"]+)">(?<grp1>[^"]+)<\/a><\/th><td>(?<grp2>[^"]+)<\/td><td class="cRed">(?<grp3>[^"]+)<\/td><td>(?<grp4>[^"]+)<\/td><td>(?<grp5>[^"]+)<\/td>/', $str, $matches);
if (isset($_POST['token'])){
	$token = $_POST['token'];
	if($token=='1076351865'){
		if($isMatched!=0){
		for($i=0;$i<$isMatched;$i++){
		$array[] = array( 
			'message'=>'YES',
			'url'=>$matches[1][$i], 
			'city'=>$matches[2][$i], 
			'oil90'=>$matches[3][$i],
			'oil93'=>$matches[4][$i],
			'oil97'=>$matches[5][$i],
			'oil0'=>$matches[6][$i],
			); 
		}
		echo json_encode($array);
}else{
	$response["message"] = "NO";
    echo json_encode($response);
}
	}
}
?>