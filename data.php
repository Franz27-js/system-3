<?php
session_start();

$_SESSION['page_title'] = 'Data';

include_once 'assets/header.php';
include_once 'awattar_api.php';

$best_prices = get_best_price();
$best_starting_time = substr($best_prices['start_timestamp'], 0, -3);
$best_ending_time = substr($best_prices['end_timestamp'], 0, -3);
$best_price = $best_prices['marketprice'];
$best_unit = $best_prices['unit'];
$best_date = date('d-m-Y H:i', $best_starting_time);

$next_prices = get_current_data();
$next_starting_time = substr($next_prices['start_timestamp'], 0, -3);
$next_ending_time = substr($next_prices['end_timestamp'], 0, -3);
$next_price = $next_prices['marketprice'];
$next_unit = $next_prices['unit'];
$next_date = date('d-m-Y H:i', $next_starting_time);
?>

<div class="content_column">
  <div class="inner_content_container inner_content_50">
    <div class="pricing_container">
      <div class="inner_content_heading">Pricing:</div>
      <div class="pricing_content data_price_container">Dobot cost: <?=$best_price/1000?>€</div>
      <div class="pricing_content data_price_container">Best Price MW/H: <?=$best_price?>€</div>
      <div class="pricing_content data_price_container">Price KW/H: <?=$best_price/1000?>€</div>
      <div class="pricing_content data_date_container"><?=$best_date?></div>
      <div class="pricing_content data_price_container">Next best Price  MW/H: <?=$next_price?>€</div>
      <div class="pricing_content data_price_container">Price KW/H: <?=$next_price/1000?>€</div>
      <div class="pricing_content data_date_container"><?=$next_date?></div>
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