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

$id = isset($_GET['id']) ? sanitize(test_input($_GET['id'])) : die();

if ($model->deleteTask($conn, $id)) {
  http_response_code(200);
  // echo json_encode(array('message' => 'Task deleted'));
} else {
  http_response_code(204);
  // echo json_encode(
  //   array('message' => 'Failed to delete')
  // );
}

