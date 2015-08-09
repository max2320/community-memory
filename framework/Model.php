<?php


class Model{

  private $db;
  private $table;
  private $fields = [];

  public function __construct($table, $fields){

    $this->db = new Database();
    $this->table = $table;
    $this->fields = $fields;

  }

  public function newRegister($datas){
    return $this->db->insert($this->table, $this->fields, $datas);
  }

  public function updateRegister($id,$datas){
    return $this->db->update($this->table, $this->fields, $datas, "id = {$id}");
  }

  public function deleteRegister($id){
    return $this->db->delete($this->table, $id);
  }

}

?>
