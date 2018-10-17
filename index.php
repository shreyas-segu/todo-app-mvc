<?php
//Routes all the data throgh the controller
include_once("controller/Controller.php");

$controller = new Controller();
$controller->invoke();

if (isset($_POST['task'])) {
  $controller->add($_POST['task']);
  $_POST['task'] = '';
}
if (isset($_GET['del'])) {
  $controller->del($_GET['del']);
  $_GET['del'] = '';
}