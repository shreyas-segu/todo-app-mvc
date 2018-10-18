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
    $db = new PDO("mysql:host=$this->dbHost;dbname=$this->dbName", $this->user, $this->pass);
    return $db;
  }

  public function getTaskList($conn)
  {
    $sql = "SELECT * FROM vtiger_task_list";
    $statement = $conn->query($sql);
    return $statement;
  }

  public function deleteTask($conn, $id)
  {
    $sql = "DELETE FROM vtiger_task_list WHERE id=(?)";
    $statement = $conn->prepare($sql);
    $statement->execute([$id]);
  }

  public function setTask($conn, $data)
  {
    $sql = "INSERT INTO vtiger_task_list(task) values (?)";
    $statement = $conn->prepare($sql);
    $statement->execute([$data]);
  }
}