<?php
class ResultSet{

  private $class;
  private $query;

  private $_db;

  private function startDB(){
    $this->_db = new Database();
  }

  private function classInitialize(){
    return new $this->class();
  } 
  
  public function __construct($class, $query){
    $this->class = $class;
    $this->query = $query;

    

    $query = $this->_db->select($this->classInitialize()->tableName(), $this->classInitialize()->prepareWhere($attr));

  }

}
?>
