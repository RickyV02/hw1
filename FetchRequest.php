<?php

include("credentials.php");
function getRequest() {

global $apikey_search;

$url = "https://imdb8.p.rapidapi.com/auto-complete?q=" .urlencode($_GET["q"]);
$headers = array(
'x-rapidapi-key: ' . $apikey_search,
'x-rapidapi-host: imdb8.p.rapidapi.com',
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

getRequest();
?>