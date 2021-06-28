<?php

if (! function_exists('generate_color')) {
  function format_price($price, $section)
  {
    $price = explode(".", number_format($price,0,',','.'));
    return $price[$section];
  }
}