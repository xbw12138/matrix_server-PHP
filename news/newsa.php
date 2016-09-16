<?PHP
set_time_limit(0);
require("db_config.php");
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ;
mysql_query("set names 'gb2312'"); 
mysql_select_db($mysql_database);
$page=60;
while($page>0){
	$str = file_get_contents('http://www.autohome.com.cn/all/'.$page.'/#liststart');
	$isMatched = preg_match_all('/<a href="(?<grp0>[^"]+)">[\s]+<div cl[^<]+pic"><img src="(?<grp1>[^"]+)"><\/div>[^<]*<h3>(?<grp2>[^<]+)<\/h3>[\S\s]+?<p>(?<grp3>[^<]+)<\/p>/', $str, $matches);

	if($isMatched!=0){
		for($i=0;$i<$isMatched;$i++){
			$xu=array();
			for($j=1;$j<=4;$j++){
				$xu[$j]=$matches[$j][$i];
			}
			$rowz=mysql_fetch_row(mysql_query("SELECT count(id) FROM news WHERE url='$xu[1]'"));
			echo $rowz[0]."--------------";
			if($rowz[0]==0){
				$result = "INSERT INTO newsa(title,content,url,pic,time) VALUES('$xu[3]','$xu[4]','$xu[1]','$xu[2]',NOW())";
				mysql_query($result);
				echo '该数据抓取成功'."<BR>";
			}else{
				echo '该数据已存在'."<BR>";
			}
			}
	}
	$page--;
}
?>
