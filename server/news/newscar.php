<?PHP
	$ret = file_get_contents('http://www.autohome.com.cn/beijing/');
	$isMatched = preg_match_all('/<a href="(?<grp0>[^"]+)">[\s]+<div class="article-pic">.+?" data-original="(?<grp1>[^"]+)"><\/div>[\s]+<h3>(?<grp2>[^<]+)<\/h3>[\s]+<div class=[\S\s]+?<\/em><\/span>[\s]+<\/div>[\s]+<p>(?<grp3>[^<]+)<\/p>[\s]+<\/a>[\s]+<\/li>/', $ret, $matches);
	var_dump($isMatched, $matches);
	echo $isMatched;
	if($isMatched!=0){
		for($i=0;$i<$isMatched;$i++){
			$arrays[] = array( 
				'message' => 'YES',
				'1' => $matches[1][$i], 
				'2' => $matches[2][$i], 
				//'3' => $matches[3][$i],
				//'4' => $matches[4][$i],
				); 
		}
	}else{
		$arrays[] = array( 
			'message'=>'NO', 
			); 
	}
	echo json_encode($arrays);
?>