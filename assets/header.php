<?php

$page_title = $_SESSION['page_title'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Lexend+Exa:wght@100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Play:wght@400;700&display=swap" rel="stylesheet">
  <!-- custom css -->
  <link rel="stylesheet" href="css/themes/themes.css">
  <link rel="stylesheet" href="css/main/main.css">
  <title><?=$page_title?></title>
</head>
<body>

  <div class="main_container dark_theme_1">
    <div class="menu_container">
      <div class="menu_inner_container">
        <div class="menu_title"><?=$page_title?></div>
        <a href="./activate_background_service.php" class="menu_link">
          <svg xmlns="http://www.w3.org/2000/svg" class="menu_link_icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-app-window-mac-icon lucide-app-window-mac"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="M6 8h.01"/><path d="M10 8h.01"/><path d="M14 8h.01"/></svg>
          Start Service
        </a>
        <a href="." class="menu_link <?= $page_title == 'Dobot' ? 'menu_link_active' : '' ?>">
          <!-- <svg xmlns="http://www.w3.org/2000/svg" class="menu_link_icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-dashboard-icon lucide-layout-dashboard"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg> -->
          <svg xmlns="http://www.w3.org/2000/svg" class="menu_link_icon"width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bot-icon lucide-bot"><path d="M12 8V4H8"/><rect width="16" height="12" x="4" y="8" rx="2"/><path d="M2 14h2"/><path d="M20 14h2"/><path d="M15 13v2"/><path d="M9 13v2"/></svg>
          Dobot
        </a>
        <a href="./data.php" class="menu_link <?= $page_title == 'Data' ? 'menu_link_active' : '' ?>">
          <svg xmlns="http://www.w3.org/2000/svg" class="menu_link_icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-spline-icon lucide-chart-spline"><path d="M3 3v16a2 2 0 0 0 2 2h16"/><path d="M7 16c.5-2 1.5-7 4-7 2 0 2 3 4 3 2.5 0 4.5-5 5-7"/></svg>
          Data
        </a>
        <!-- <div class="menu_link">
          <svg xmlns="http://www.w3.org/2000/svg" class="menu_link_icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-swatch-book-icon lucide-swatch-book"><path d="M11 17a4 4 0 0 1-8 0V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2Z"/><path d="M16.7 13H19a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H7"/><path d="M 7 17h.01"/><path d="m11 8 2.3-2.3a2.4 2.4 0 0 1 3.404.004L18.6 7.6a2.4 2.4 0 0 1 .026 3.434L9.9 19.8"/></svg>
          <select name="themes_select" id="themes_select"></select>
        </div> -->
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
