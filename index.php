<?php
require __DIR__ . '/vendor/autoload.php';

use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;

include_once 'assets/header.php';

$server   = '10.100.20.181';
$port     = 1883;
$clientId = 'php-sub-client-' . rand(1000, 9999);
$username = null;
$password = null;

$connectionSettings = (new ConnectionSettings)
  ->setUsername($username)
  ->setPassword($password);

// $mqtt = new MqttClient($server, $port, $clientId);

// $mqtt->connect($connectionSettings, true);

// $mqtt->subscribe('mein/beispiel/topic', function (string $topic, string $message) {
//   echo "Received message on topic [$topic]: $message\n";
// }, 0);

// $mqtt->loop(true);


?>

      <div class="content_column">
        <div id="test_publish" class="inner_content_container inner_content_75"></div>
        <div class="inner_content_container inner_content_25"></div>
      </div>
      <div class="content_column">
        <div class="inner_content_container"></div>
      </div>
  
<?php

include_once 'assets/footer.php';