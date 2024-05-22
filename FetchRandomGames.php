<?php

include("credentials.php");
include("getToken.php");

function getGames() {
    
    global $client_id_twitch;
    $token= getToken();
    
    $url = "https://api.igdb.com/v4/games";
    $data = "fields name,cover.game,cover.image_id;limit 500;where (cover != null) & (release_dates.platform = (1,6));";

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