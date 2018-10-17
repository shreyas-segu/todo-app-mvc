<?php
include_once("model/Task.php");
include_once("model/config.php");

class Model
{

  private $user = DBUSER;
  private $pass = DBPWD;
  private $dbName = DBNAME;
  private $dbHost = DBHOST;

  public function __construct()
  {

  }

  public function connect()
  {
    $db = mysqli_connect($this->dbHost, $this->user, $this->pass, $this->dbName);
    if (mysqli_connect_error()) {
      exit('Connect Error (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
    }
    return $db;
  }

  public function getTaskList($conn)
  {
    $queryResult = mysqli_query($conn, "SELECT * FROM vtiger_task_list");
    return $queryResult;
  }

  public function getTask($id)
  {
    $allTasks = $this->getTaskList();
    return $allTasks[$id];
  }

  public function deleteTask($conn, $id)
  {
    mysqli_query($conn, "DELETE FROM vtiger_task_list WHERE id=" . $id);
  }

  public function setTask($conn, $data)
  {
    if (!mysqli_query($conn, "INSERT INTO vtiger_task_list(task) values ('$data')")) {
      echo mysqli_error($conn);
    }
  }
}