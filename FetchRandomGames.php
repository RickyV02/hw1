<?php

include("credentials.php");
function getGames() {
    
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
    
    $url = "https://api.igdb.com/v4/games";
    $data = "fields *;limit 500;";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept: application/json',
    'Client-ID: ' . $client_id_twitch,
    'Authorization: Bearer ' . $token['access_token']
    ));

    $response = curl_exec($ch);
    curl_close($ch);
    echo $response;
    
}

getGames();
?>