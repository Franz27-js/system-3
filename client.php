<?php

// ini_set('display_errors', 1);
// require __DIR__ . '/vendor/autoload.php';

// use PhpMqtt\Client\MqttClient;
// use PhpMqtt\Client\ConnectionSettings;

// // Allow this script to run for a short time
// // set_time_limit(5); // 5 seconds max execution time
// // session_write_close(); // Don't block other requests

// // Store received messages
// $messages = [];
// $hasNewMessages = false;

// $server   = '10.100.20.181';
// $port = 1883;
// $clientId = 'php-sub-client-' . rand(1, 1000);

// // try {
// //   $mqtt = new MqttClient($server, $port, $clientId);
// //   $mqtt->connect(null, true);
  
// //   $topic = 'mein/beispiel/topic';

// //   //* Uncomment to publish a message 
// //   // $mqtt->publish($topic, 'Test message: asdf');
// //   // echo "Message published!\n";
  
// //   // Subscribe and collect messages
// //   $mqtt->subscribe($topic, function ($topic, $message) use (&$messages, &$hasNewMessages) {
// //     $messages[] = [
// //       'topic' => $topic,
// //       'message' => $message,
// //       'timestamp' => date('Y-m-d H:i:s')
// //     ];
// //     $hasNewMessages = true;
// //   }, 0);

// //   // Process messages for a short time
// //   $startTime = time();
// //   while (time() - $startTime < 3) { // Run for max 3 seconds
// //     $mqtt->loop(false, 0.1); // Non-blocking loop with 100ms timeout
// //     if ($hasNewMessages) {
// //       break; // Exit early if we got messages
// //     }
// //   }

// //   var_dump($messages);die;

// //   $mqtt->disconnect();
  
// //   // Return messages as JSON
// //   header('Content-Type: application/json');
// //   echo json_encode([
// //     'success' => true,
// //     'messages' => $messages
// //   ]);
    
// // } catch (Exception $e) {
// //   header('Content-Type: application/json');
// //   echo json_encode([
// //     'success' => false,
// //     'error' => $e->getMessage()
// //   ]);
// // }

// try {
//   // Create connection settings with longer timeout
//   $connectionSettings = new ConnectionSettings();
//   $connectionSettings->setConnectTimeout(5); // 5 seconds connection timeout
  
//   echo "Connecting to MQTT broker at $server:$port as $clientId...<br>";
//   flush();
  
//   $mqtt = new MqttClient($server, $port, $clientId);
//   $mqtt->connect($connectionSettings, true);
  
//   echo "Connected successfully!<br>";
//   flush();
  
//   $topic = 'mein/beispiel/topic';
//   echo "Subscribing to topic: $topic<br>";
//   flush();
  
//   // Subscribe and collect messages
//   $mqtt->subscribe($topic, function ($topic, $message) use (&$messages, &$hasNewMessages, &$messageCount) {
//     $messageCount++;
//     echo "Received message #$messageCount on topic [$topic]: $message<br>";
//     flush();
    
//     $messages[] = [
//       'topic' => $topic,
//       'message' => $message,
//       'timestamp' => date('Y-m-d H:i:s')
//     ];
//     $hasNewMessages = true;
//   }, 0);
  
//   echo "Subscription successful!<br>";
//   echo "Starting message loop for up to 10 seconds...<br>";
//   flush();
  
//   // Process messages for a longer time
//   $startTime = time();
//   $loopCount = 0;
  
//   while (time() - $startTime < 10) { // Run for max 10 seconds
//     $loopCount++;
//     $mqtt->loop(false, 0.1); // Non-blocking loop with 100ms timeout
    
//     if ($loopCount % 10 == 0) {
//       echo "."; // Progress indicator
//       flush();
//     }
    
//     if ($hasNewMessages && $loopCount % 10 == 0) {
//       echo "<br>Messages received so far: $messageCount<br>";
//       flush();
//     }
//   }
  
//   echo "<br>Loop completed after $loopCount iterations.<br>";
//   echo "Total messages received: $messageCount<br>";
  
//   $mqtt->disconnect();
//   echo "Disconnected from broker.<br>";
  
//   // Return messages
//   echo "<hr><h3>Received Messages:</h3>";
//   if (count($messages) > 0) {
//     echo "<ul>";
//     foreach ($messages as $msg) {
//       echo "<li><strong>Topic:</strong> {$msg['topic']}, <strong>Message:</strong> {$msg['message']}, <strong>Time:</strong> {$msg['timestamp']}</li>";
//     }
//     echo "</ul>";
//   } else {
//     echo "<p>No messages received.</p>";
//   }
    
// } catch (Exception $e) {
//   echo "<hr><h3>Error:</h3>";
//   echo "<p>{$e->getMessage()}</p>";
//   echo "<p>File: {$e->getFile()}, Line: {$e->getLine()}</p>";
// }