<?php

class Install{
  private $db;

  public function __construct($classCatalog){
    $this->db = new Database();
    foreach($classCatalog as $class){
      $this->db->executeSql($class::createTable());
    }
  }
}

?>
