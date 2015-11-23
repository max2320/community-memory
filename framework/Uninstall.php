<?php

class Uninstall{
  private $db;

  public function __construct($classCatalog){
    $this->db = new Database();
    foreach($classCatalog as $class){
    	$table = new $class;
      $this->db->query("DROP TABLE {$table->tableName()} CASCADE");
    }
  }
}

?>
