<?php

class Install{
  private $db;

  public function __construct($classCatalog){
    $this->db = new Database();
    foreach($classCatalog as $class){

      echo "CREATING::{$class}<br><pre>" . $class;
      var_dump($this->db->query($class::createTable()));
      echo "</pre><br>";
    }
  }
}

?>
