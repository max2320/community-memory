<?php
class Post{

  public $model;

  public function __construct(){
    $this->model = new Model($this->tableName(), $this->fields());
  }
  private function tableName(){
    return 'post';
  }
  private function fields(){
    return ['content', 'image', 'likes'];
  }

  public static function createTable(){
    return "CREATE TABLE post(
      id INTEGER NOT NULL AUTO_INCREMENT,
      content TEXT NOT NULL,
      image VARCHAR(255) NOT NULL,
      likes INTEGER NOT NULL,
      PRIMARY KEY(id)
    );";
  }

  public function create($data){
    $this->model->newRegister($data);
  }
}


?>
