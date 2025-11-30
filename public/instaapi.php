<?php

header('Content-Type: application/json; charset=utf-8');


//get instagram ID
$id = $_GET['post_id'];


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://instagram-scraper-api2.p.rapidapi.com/v1/post_info?code_or_id_or_url=$id&include_insights=true",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'x-rapidapi-key: ce8b53d9c4msh8e8a057bf10c0eap17ae92jsnea6935f33efa',
    'x-rapidapi-host: instagram-scraper-api2.p.rapidapi.com'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
$response = json_decode($response);

echo "<p>Post Text:"." ".$response->data->caption->text . "</p>";




?>