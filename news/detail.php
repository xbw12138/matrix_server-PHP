<?PHP

if (isset($_GET['url'])) {
	$url=$_GET['url'];
	$str = file_get_contents($url);
	$isMatched = preg_match('/<div class="article-content" id="articleContent">(?<grp0>[\S\s]+?)<div class="article-moreuse fn-clear">/', $str, $matches);
	if($isMatched==0){
		echo "NO FIND";
	}else{
		echo $matches[0];
	}
}else{
	echo "ERROR";
}
?>