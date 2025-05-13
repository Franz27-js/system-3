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

$mqtt = new MqttClient($server, $port, $clientId);

$mqtt->connect($connectionSettings, true);

$mqtt->subscribe('mein/beispiel/topic', function (string $topic, string $message) {
  echo "Received message on topic [$topic]: $message\n";
}, 0);

$mqtt->loop(true);


?>

  <div class="main_container dark_theme_1">
    <div class="menu_container">
      <div class="menu_inner_container">
        <div class="menu_title">Dashboard</div>
        <div class="menu_link menu_link_active">
          <svg xmlns="http://www.w3.org/2000/svg" class="menu_link_icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-dashboard-icon lucide-layout-dashboard"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>
          Dashboard
        </div>
        <div class="menu_link">
          <svg xmlns="http://www.w3.org/2000/svg" class="menu_link_icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-app-window-mac-icon lucide-app-window-mac"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="M6 8h.01"/><path d="M10 8h.01"/><path d="M14 8h.01"/></svg>
          Console
        </div>
        <div class="menu_link">
          <svg xmlns="http://www.w3.org/2000/svg" class="menu_link_icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-spline-icon lucide-chart-spline"><path d="M3 3v16a2 2 0 0 0 2 2h16"/><path d="M7 16c.5-2 1.5-7 4-7 2 0 2 3 4 3 2.5 0 4.5-5 5-7"/></svg>
          Charts
        </div>
        <div class="menu_link">
          <svg xmlns="http://www.w3.org/2000/svg" class="menu_link_icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-swatch-book-icon lucide-swatch-book"><path d="M11 17a4 4 0 0 1-8 0V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2Z"/><path d="M16.7 13H19a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H7"/><path d="M 7 17h.01"/><path d="m11 8 2.3-2.3a2.4 2.4 0 0 1 3.404.004L18.6 7.6a2.4 2.4 0 0 1 .026 3.434L9.9 19.8"/></svg>
          Themes
        </div>
      </div>
      <div class="menu_inner_container">
        <!-- <a href="" class="menu_link">
          <svg xmlns="http://www.w3.org/2000/svg" class="menu_link_icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round-pen-icon lucide-user-round-pen"><path d="M2 21a8 8 0 0 1 10.821-7.487"/><path d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/><circle cx="10" cy="8" r="5"/></svg>
          Menu
        </a> -->
        <div class="profile_container">
          <div class="user_icon_container">
            <svg xmlns="http://www.w3.org/2000/svg" class="user_profile_icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round-icon lucide-user-round"><circle cx="12" cy="8" r="5"/><path d="M20 21a8 8 0 0 0-16 0"/></svg>
            <div class="__user_identifier__"></div>
          </div>
          <div class="profile_name">User 1842</div>
        </div>
      </div>
    </div>
    <div class="content_container">
      <div class="content_column">
        <div id="test_publish" class="inner_content_container inner_content_75"></div>
        <div class="inner_content_container inner_content_25"></div>
      </div>
      <div class="content_column">
        <div class="inner_content_container"></div>
      </div>
    </div>
  </div>
  
<?php

include_once 'assets/footer.php';