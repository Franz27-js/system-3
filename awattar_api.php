<?php

function get_api_data(): array {
  $today_start = strtotime('today 00:00');
  $today_end = strtotime('today 23:59');

  $tomorrow_start = strtotime('tomorrow 00:00');
  $tomorrow_end = strtotime('tomorrow 23:59');

  // api url
  $api_url = 'https://api.awattar.at/v1/marketdata?start='.$today_start.'000&end='.$today_end.'000';

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
    return json_decode($response, true)['data'];
  } else {
    return [];
  }
}

function get_current_data(): array {
  // api url
  $api_url = 'https://api.awattar.at/v1/marketdata?start='.strtotime('now').'000';

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
    return json_decode($response, true)['data'][0];
  } else {
    return [];
  }
}

function get_best_price(): array {
  $raw_data = get_api_data();

  $price = array_column($raw_data, 'marketprice');

  array_multisort($price, SORT_ASC, $raw_data);

  $best_data = $raw_data[0];

  return $best_data;
}