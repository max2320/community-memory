<?php

class Model{

  private $_db;

  
  private function startDB(){
    $this->_db = new Database();
  }

  public function attr($name){
    if(isset($this->$name)){
      return $this->$name;
    }
    return '';
  }

  private function prepareWhere($array){
    $where = [];
    
    foreach($array as $column => $value){
      if(!is_numeric($value)){
        $value = "'{$value}'";
      }

      array_push($where, "{$column} = {$value}");
    }
    return implode(' AND ', $where);
  }

  public function find($id){
    self::findByAttr([
      'id' => $id
    ]);
  }

  public function findByAttr($attr){
    $this->isNew = false;
    $query = $this->_db->select($this->tableName(), $this->prepareWhere($attr));
    $data = [];
    foreach($query as $k => $row){
      $this->dataToModel($row);
    }
  }

  public function save(){
    if($this->isNew){
      return $this->newRegister($this->modelToData());
    }else{
      return $this->updateRegister($this->id, $this->modelToData());
    }
  }

  public function delete(){
    $this->deleteRegister($this->id);
  }

  private function modelToData(){
    $datas = [];
    foreach($this->columns() as $column){
      $datas[$column] = $this->$column;
    }
    return $datas;
  }

  private function dataToModel($data){
    foreach($this->columns() as $column){
      $this->$column = $data[$column];
    }
  }

  private function newRegister($datas){
    var_dump($this->tableName(), array_keys($datas), $datas);
    return $this->_db->insert($this->tableName(), array_keys($datas), $datas);
  }

  private function updateRegister($id,$datas){
    return $this->_db->update($this->tableName(), array_keys($datas), $datas, "id = {$id}");
  }

  private function deleteRegister($id){
    return $this->_db->delete($this->tableName(), $id);
  }

  private function setupAttributes(){
    foreach($this->columns() as $column){
      $this->$column = $column;
    }
  }

  public function __construct($data = []){
    $this->isNew = true;
    $this->setupAttributes();    

    $this->dataToModel($data);
    $this->startDB();
  }
}

?>
