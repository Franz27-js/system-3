<?php
session_start();

$_SESSION['page_title'] = 'Dobot';

include_once 'assets/header.php';

?>

  <div class="content_column">
    <div class="inner_content_container inner_content_50">
      <div class="inner_content_heading">Last scanned color:</div>
      <div class="upload_container">
        <div id="color_blue" class="colors_container">
          <div class="color_circle color_circle_blue"></div>
          Blue
        </div>
        <div id="color_red" class="colors_container">
          <div class="color_circle color_circle_red"></div>
          Red
        </div>
        <div id="color_green" class="colors_container __selected_color__">
          <div class="color_circle color_circle_green"></div>
          Green
        </div>
        <div id="color_yellow" class="colors_container">
          <div class="color_circle color_circle_yellow"></div>
          Yellow
        </div>
      </div>
    </div>
    <form action="soap_client.php" method="POST"  class="inner_content_container inner_content_50">
      <div class="dobot_buttons_container">
        <button type="submit"  name="dobot_button" value="Homing" class="dobot_control_button">Homing</button>
        <button type="submit" name="dobot_button" value="StartDobotProgram" class="dobot_control_button">Dobot starten</button>
        <div name="dobot_button" value="get_color" class="dobot_control_button">Farbe identifizieren</div>
      </div>
    </form>
  </div>
  
  
<?php

include_once 'assets/footer.php';