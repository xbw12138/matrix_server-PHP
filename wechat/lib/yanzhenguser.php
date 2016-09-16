<?php
session_start();
if(isset($_SESSION['username'])){
	
}else{
	header("Location:user/login.php");
}

?>