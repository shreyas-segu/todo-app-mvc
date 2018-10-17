<?php

include_once("model/Model.php");

class Controller
{
  public $model;
  public $desc;

  public function __construct()
  {
    $this->model = new Model();
  }

  public function invoke()
  {
    $connection = $this->model->connect();
    $tasks = $this->model->getTaskList($connection);
    include 'view/TaskList.php';
  }

  public function add($data)
  {
    $connection = $this->model->connect();
    $this->model->setTask($connection, $data);
    $tasks = $this->model->getTaskList($connection);
    header("Refresh:0");
  }
  public function del($id)
  {
    $connection = $this->model->connect();
    $this->model->deleteTask($connection, $id);
    $tasks = $this->model->getTaskList($connection);
    header("Location: ./?v=30");
  }
}