<?php
//Routes all the data throgh the controller
include_once("controller/Controller.php");
// include_once("init.php");

$controller = new Controller();
$controller->invoke();

if (isset($_POST['task'])) {
  $formtask = test_input($_POST['task']);
  $formtask = sanitize($formtask);
  $controller->add($formtask);
  $_POST['task'] = '';
}
if (isset($_GET['del'])) {
  $controller->del($_GET['del']);
  $_GET['del'] = '';
}
function test_input($input)
{

  $search = array(
    '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
    '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
    '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
  );

  $output = preg_replace($search, '', $input);
  if ($output == '') {
    return 'NULL';
  }
  return $output;
}
function sanitize($input)
{
  if (is_array($input)) {
    foreach ($input as $var => $val) {
      $output[$var] = sanitize($val);
    }
  } else {
    if (get_magic_quotes_gpc()) {
      $input = stripslashes($input);
    }
    $output = test_input($input);
  }
  return $output;
}