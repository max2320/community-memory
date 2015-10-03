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

    return $this->db->insert($this->table, array_keys($datas), $datas);
  }

  public function updateRegister($id,$datas){
    return $this->db->update($this->table, array_keys($datas), $datas, "id = {$id}");
  }

  public function deleteRegister($id){
    return $this->db->delete($this->table, $id);
  }

  public function select($fields, $where){
    return $this->db->select($this->table, $fields, $where);
  }
}

?>
