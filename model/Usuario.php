<?php
class Usuario{

  private $model;

  public function __construct(){
    $this->model = new Model($this->tableName(), $this->fields());
  }
  private function tableName(){
    return 'usuarios';
  }
  private function fields(){
    return ['nome', 'usuario', 'senha', 'status'];
  }

  public static function createTable(){
    return "CREATE TABLE usuarios(
      id INTEGER NOT NULL AUTO_INCREMENT,
      nome VARCHAR(255) NOT NULL,
      usuario VARCHAR(255) NOT NULL,
      senha VARCHAR(255) NOT NULL,
      status INTEGER NOT NULL,
      PRIMARY KEY(id)
    );";
  }

  public function create($data){
    $this->model->newRegister($data);
  }
}


?>
