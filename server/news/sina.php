<?php
//$url = empty($_GET['url'])?$_GET['url']:'';
$options = array(
	'http'=> array(
		'User-Agent'=>'sipder',   //把浏览器伪造成百度蜘蛛.
		'Cookie'=>'ALC=ac%3D0%26bt%3D1464315819%26cv%3D5.0%26et%3D1495851819%26uid%3D5368201773%26vf%3D0%26vs%3D1%26vt%3D0%26es%3D5b297cabcff2b12b4e7852faacbd70e2; U_TRS1=000000ee.d269f1b.571c50d0.7dcb36fc; vjuids=da4bf836.154469bc1a6.0.44858d3b90e3d; vjlast=1461473493.1464077763.11; UOR=www.baidu.com,blog.sina.com.cn,; SINAGLOBAL=119.167.70.30_1461473492.391437; ULV=1461836153020:4:4:4::1461512816597; SUBP=0033WrSXqPxfM725Ws9jqgMF55529P9D9WW8mkwXBZWowD8wP3ORzVe.5NHD95Qfe0qReo5pS0M0Ws4DqcjTBJ8.PX87MspLPfYt; ALF=1495851819; Apache=117.41.237.194_1464507682.124306',
	)
);
$context = stream_context_create($options);
$code = file_get_contents('http://weibo.com/',false,$context);
echo $code;

?>