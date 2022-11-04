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
function checkImgType($fileName)
{
  $imgType = false;
  $allowedfileExtensions = array("jpg", "png", "gif", "bmp");
  for($a = 0; $a < count($allowedfileExtensions); $a++){
	if(pathinfo($fileName, PATHINFO_EXTENSION) == $allowedfileExtensions[$a]){
    $imgType = true;
    return true;
  }
}
  if(!$imgType == false){
    return false;
  }
}
?>