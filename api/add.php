<?php

require_once '../model/config.php';
require_once '../model/Model.php';
require_once 'format_input.php';


header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


$model = new Model();

$conn = $model->connect();

$taskDescription = isset($_GET['description']) ? sanitize(test_input($_GET['description'])) : die();

if ($model->setTask($conn, $taskDescription)) {
  http_response_code(201);
  echo json_encode(array('message' => 'Task inserted'));
} else {
  // echo json_encode(
  //   array('message' => 'Failed to insert')
  // );
  http_response_code(204);
}

