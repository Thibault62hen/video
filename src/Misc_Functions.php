<?php
function sanitize($input) {
  if (is_array($input)) {
      foreach($input as $var=>$val) {
          $output[$var] = sanitize($val);
      }
  }
  else {
    $input = str_ireplace("'", "", $input);
    $input = str_ireplace(";", "", $input);
    $input = str_ireplace("-", "", $input);
    $input = trim($input);
    $input = stripslashes($input);
    $output = $input;
  }
  return $output;
}
?>