<?php
    include("credentials.php");
    
function getToken(){
    global $client_id_twitch;
    global $client_secret_twitch;

    $url_token = "https://id.twitch.tv/oauth2/token";
    $data = array(
        'client_id' => $client_id_twitch,
        'client_secret' => $client_secret_twitch,
        'grant_type' => 'client_credentials'
    );
    
    $options_token = array(
        CURLOPT_URL => $url_token,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query($data),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded'
        )
    );
    
    $curl = curl_init();
    curl_setopt_array($curl, $options_token);
    $token=json_decode(curl_exec($curl), true);
    curl_close($curl);

    return $token;
}
getToken();
?>