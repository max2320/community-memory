<?php

class Install{
  private $db;

  public function __construct($classCatalog){
    $this->db = new Database();
    foreach($classCatalog as $class){

      echo "CREATING::" . $class . "<br>";
      if($this->db->query($class::createTable())){
        echo "OK<br>";
      }else{
        echo "FAIL<br>";
      }
    }
  }
}

?>
