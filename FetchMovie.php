<?php

include("credentials.php");
function searchMovie() {

global $apikey;

$url = "https://imdb146.p.rapidapi.com/v1/title/?id=".urlencode($_GET["q"]);
$headers = array(
'x-rapidapi-key: ' . $apikey,
'x-rapidapi-host: imdb146.p.rapidapi.com',
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

searchMovie();
?>