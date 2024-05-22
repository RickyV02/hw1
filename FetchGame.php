<?php

include("credentials.php");
include("getToken.php");
function searchGame() {

    global $client_id_twitch;
    $token= getToken();
    
    $url = "https://api.igdb.com/v4/games";
    $name=$_GET["q"];
    $data = 'search "'. $name .'";'.
        'fields id,name,alternative_names.name,genres.name,release_dates.*,cover.image_id,genres.*,summary,storyline,rating,platforms.name,themes.name;';
    
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

searchGame();
?>