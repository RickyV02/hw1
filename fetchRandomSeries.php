<?php

include("credentials.php");
function getSeries() {

global $apikey;

$url = 'https://imdb-top-100-movies.p.rapidapi.com/series/';
$headers = array(
'x-rapidapi-key: ' . $apikey,
'x-rapidapi-host: imdb-top-100-movies.p.rapidapi.com',
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

getSeries();
?>