<?php
class ResultSet{

  private $class;
  private $query;

  private $rsDB;
  private $rs;

  private $_db;

  private function startDB(){
    $this->_db = new Database();
  }

  private function classInitialize(){
    return new $this->class();
  } 

  private function tableName(){
   return $this->classInitialize()->tableName(); 
  }
  
  private function prepareWhere($attr) {
    $where = [];
    
    foreach($attr as $column => $value){
      if(!is_numeric($value)){
        $value = "'{$value}'";
      }

      array_push($where, "{$column} = {$value}");
    }
    
    return implode(' AND ', $where);
  }

  private function parseToModels(){
    foreach($this->rsDB as $item){
      $model = $this->classInitialize();
      $model->find($item['id']);
      array_push($this->rs, $model);
    }
  }

  public function getRS(){
    return $this->rs;
  }

  public function __construct($class, $query, $ordination = 'id'){
    $this->startDB();
    $this->class = $class;
    $this->query = $query;

    $this->rs = [];

    $this->rsDB = $this->_db->select($this->tableName(), $this->prepareWhere($query),'id');
    
    $this->parseToModels();
  }

  public static function find($class, $query, $ordination = 'id'){
    $find = new self($class, $query);

    return $find->getRS();
  }

}
?>
