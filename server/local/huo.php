<?PHP
require("db_config.php");
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ;
mysql_query("set names 'utf8'"); 
mysql_select_db($mysql_database);
$str = file_get_contents('http://115.159.26.120/androidapp_matrix/local/a.php');
$isMatched = preg_match_all('/<a href="(?<grp0>[^"]+)">(?<grp1>[^"]+)<\/a>/', $str, $matches);
if($isMatched!=0){
		for($i=0;$i<$isMatched;$i++){
			$xu=array();
			for($j=1;$j<=2;$j++){
				$xu[$j]=$matches[$j][$i];
			}
			$uu='http://www.bitauto.com'.$xu[1];
			$result = "INSERT INTO local(url,city) VALUES('$uu','$xu[2]')";
			mysql_query($result);
			echo '该数据抓取成功'."<BR>";
		}
		
}else{
	
}



?>