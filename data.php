<?php
session_start();

$_SESSION['page_title'] = 'Data';

include_once 'assets/header.php';

?>

<div class="content_column">
  <div class="inner_content_container inner_content_50">
    <div class="pricing_container">
      <div class="inner_content_heading">Pricing:</div>
    </div>
  </div>
</div>
<div class="content_column">
  <div class="inner_content_container">
    <div class="inner_content_heading">Sensor values:</div>
    <div class="sensor_values_table_container">
      <div class="sensor_table_row row_dates">
        <div class="sensor_table_heading temperature_heading"> Date:</div>
        <div class="sensor_table_cell"></div>
        <div class="sensor_table_cell"></div>
        <div class="sensor_table_cell"></div>
        <div class="sensor_table_cell"></div>
        <div class="sensor_table_cell"></div>
      </div>
      <div class="sensor_table_row row_temperature">
        <div class="sensor_table_heading middle_row temperature_heading">Temperature:</div>
        <div class="sensor_table_cell middle_row"></div>
        <div class="sensor_table_cell middle_row"></div>
        <div class="sensor_table_cell middle_row"></div>
        <div class="sensor_table_cell middle_row"></div>
        <div class="sensor_table_cell middle_row"></div>
      </div>
      <div class="sensor_table_row row_humidity">
        <div class="sensor_table_heading humidity_heading">Humidity:</div>
        <div class="sensor_table_cell"></div>
        <div class="sensor_table_cell"></div>
        <div class="sensor_table_cell"></div>
        <div class="sensor_table_cell"></div>
        <div class="sensor_table_cell"></div>
      </div>
    </div>
  </div>
</div>


<?php

include_once 'assets/footer.php';