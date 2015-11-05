<?php

class Model{

  private $_db;

  
  private function startDB(){
    $this->_db = new Database();
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
      $this->newRegister($this->modelToData());
    }else{
      $this->updateRegister($this->id, $this->modelToData());
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
    return $this->DB()->insert($this->table, array_keys($datas), $datas);
  }

  private function updateRegister($id,$datas){
    return $this->DB()->update($this->table, array_keys($datas), $datas, "id = {$id}");
  }

  private function deleteRegister($id){
    return $this->DB()->delete($this->table, $id);
  }

  public function __construct($data = []){
    $this->isNew = true;

    $this->dataToModel($data);
    
    $this->startDB();
  }
}

?>
