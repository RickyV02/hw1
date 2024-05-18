<?php

function getMovies() {

    $apikey = "83d90273b9msh182624ed0f75e4ap148f8ejsn46464751b036";

    $url = 'https://imdb188.p.rapidapi.com/api/v1/getWeekTop10';
    $headers = array(
        'x-rapidapi-key: %',
        'x-rapidapi-host: imdb188.p.rapidapi.com',
        'Content-Type: application/json'
    );
    
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL,$url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
}

getMovies();
?>