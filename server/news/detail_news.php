<?PHP
$str = file_get_contents('http://www.autohome.com.cn/news/201605/888857.html#pvareaid=102624');
$isMatched = preg_match('/<div class="article-content" id="articleContent">(?<grp0>[\S\s]+?)<div class="article-moreuse fn-clear">/', $str, $matches);
var_dump($isMatched, $matches);
?>