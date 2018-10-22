<?php

require_once '../model/config.php';
require_once '../model/Model.php';


header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$model = new Model();

$conn = $model->connect();

$result = $model->getTaskList($conn);

$count = $result->rowCount();

if ($count > 0) {
  $taskArray = array();
  $taskArray['tasks'] = array();

  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $taskItem = array(
      'id' => $id,
      'description' => $task
    );
    array_push($taskArray['tasks'], $taskItem);
  }
  http_response_code(200);
  echo json_encode($taskArray, JSON_PRETTY_PRINT);

} else {
  http_response_code(204);
}

