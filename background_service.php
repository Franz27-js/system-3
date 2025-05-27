<?php
require __DIR__ . '/vendor/autoload.php';
use PhpMqtt\Client\MqttClient;

// Set a longer execution time (5 minutes)
set_time_limit(300);

// Create a file for logging
$logFile = __DIR__ . '/mqtt_log.log';
file_put_contents($logFile, "MQTT Background Service started: " . date('Y-m-d H:i:s') . "\n");

function log_message($message) {
  global $logFile;
  $timestamp = date('Y-m-d H:i:s');
  file_put_contents($logFile, "[$timestamp] $message\n", FILE_APPEND);
  
  // Also write to a status file for the web interface to read
  $statusFile = __DIR__ . '/mqtt_status.json';
  $status = [
    'lastUpdate' => $timestamp,
    'message' => $message
  ];
  
  if (file_exists($statusFile)) {
    $currentStatus = json_decode(file_get_contents($statusFile), true);
    if (isset($currentStatus['messages'])) {
      $status['messages'] = $currentStatus['messages'];
    } else {
      $status['messages'] = [];
    }
  } else {
    $status['messages'] = [];
  }
  
  file_put_contents($statusFile, json_encode($status));
}

function add_message($topic, $message) {
  $statusFile = __DIR__ . '/mqtt_status.json';
  $status = [];
  
  if (file_exists($statusFile)) {
    $status = json_decode(file_get_contents($statusFile), true);
  }
  
  if (!isset($status['messages'])) {
    $status['messages'] = [];
  }
  
  // Add new message to the beginning of the array
  array_unshift($status['messages'], [
    'topic' => $topic,
    'message' => $message,
    'timestamp' => date('Y-m-d H:i:s')
  ]);
  
  // Keep only the last 50 messages
  if (count($status['messages']) > 50) {
    $status['messages'] = array_slice($status['messages'], 0, 50);
  }
  
  $status['lastUpdate'] = date('Y-m-d H:i:s');
  $status['message'] = "Received message on topic: $topic";
  
  file_put_contents($statusFile, json_encode($status));
}

// Function to create and run an MQTT client
function run_mqtt_client() {
  $server = '10.100.20.181';
  $port = 1883;
  $clientId = 'background-service-' . rand(1, 10000);
  
  try {
    log_message("Connecting to MQTT broker at $server:$port as $clientId");
    $mqtt = new MqttClient($server, $port, $clientId);
    $mqtt->connect();
    log_message("Connected successfully");
    
    $topic = 'color'; // Change to your desired topic
    log_message("Subscribing to topic: $topic");
    
    $mqtt->subscribe($topic, function ($topic, $message) {
      log_message("Received message on topic [$topic]: $message");
      add_message($topic, $message);
    }, 0);
    
    log_message("Starting message loop");
    
    // Keep the client running until interrupted
    $startTime = time();
    $loopCount = 0;
    while (true) {
      $loopCount++;
      $mqtt->loop(false, 1); // Non-blocking loop with 1 second timeout
      
      if ($loopCount % 60 == 0) {
        $uptime = time() - $startTime;
        log_message("Service uptime: $uptime seconds, loop count: $loopCount");
      }
    }
      
  } catch (Exception $e) {
    log_message("Error: " . $e->getMessage());
    log_message("Will attempt to reconnect in 10 seconds");
    sleep(10);
    run_mqtt_client(); // Attempt to reconnect
  }
}

// Start the MQTT client
run_mqtt_client();