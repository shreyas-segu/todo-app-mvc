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
    $statement = "SELECT * FROM vtiger_task_list";
    $queryResult = mysqli_query($conn, $statement);
    return $queryResult;
  }

  public function getTask($id)
  {
    $allTasks = $this->getTaskList();
    return $allTasks[$id];
  }

  public function deleteTask($conn, $id)
  {
    $statement = $conn->prepare("DELETE FROM vtiger_task_list WHERE id=(?)");
    $statement->bind_param("i", $id);
    $statement->execute();
  }

  public function setTask($conn, $data)
  {
    $statement = $conn->prepare("INSERT INTO vtiger_task_list(task) values (?)");
    $statement->bind_param("s", $data);
    $statement->execute();
  }
}