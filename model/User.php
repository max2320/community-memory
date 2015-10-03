<?php
class User{

  private $model;

  public function __construct(){
    $this->model = new Model($this->tableName(), $this->fields());
  }
  
  public function tableName(){
    return 'user';
  }

  private function fields(){
    return ['name', 'birth_date', 'user', 'password', 'status'];
  }

  public static function createTable(){
    return "CREATE TABLE user(
      id INTEGER NOT NULL AUTO_INCREMENT,
      name VARCHAR(255) NOT NULL,
      birth_date DATETIME NOT NULL,
      user VARCHAR(255) NOT NULL,
      password VARCHAR(255) NOT NULL,
      status INTEGER NOT NULL,
      PRIMARY KEY(id)
    );";
  }

  public function create($data){
    $this->model->newRegister($data);
  }
}


?>
