<?php
session_start();
session_destroy();
//setcookie("user_name", "", time()-3600);
//setcookie("user_pwd", "", time()-3600);
//setcookie("uid", "", time()-3600);
//setcookie("user_email", "", time()-3600);
header("Location:login.php");
exit;
?>