<?php

$today_start = strtotime('today 00:00');
$today_end = strtotime('today 23:59');

$tomorrow_start = strtotime('tomorrow 00:00');
$tomorrow_end = strtotime('tomorrow 23:59');

// api url
$api_url = 'https://api.awattar.at/v1/marketdata?start='.$today_start.'000&end='.$tomorrow_end.'000';

var_dump($api_url);

// Initialize cURL
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);

// Execute the request
$response = curl_exec($ch);

// Get HTTP status code
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// Close cURL
curl_close($ch);

// Check if request was successful
if ($httpCode >= 200 && $httpCode < 300) {
  // Decode JSON response
  $data = json_decode($response, true)['data'][0];

  var_dump($data);
}