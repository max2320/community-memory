<?php
class Post extends Model{

  public function tableName(){
    return 'post';
  } 
  
  public function columns(){ 
    return [
      'id',
      'content', 
      'image', 
      'likes', 
      'user_id',
    ];
  } 

  public function validators(){ 
    return [
      'birth_date'=>'date', 
      'email'=>'email', 
      'status'=>'integer'
    ];
  }
  
  public static function createTable(){
    return "CREATE TABLE IF NOT EXISTS post(
      id INTEGER NOT NULL AUTO_INCREMENT,
      user_id INTEGER NOT NULL REFERENCES users(id),
      content TEXT,
      image VARCHAR(255),
      likes INTEGER NOT NULL DEFAULT 0,
      date_time DATETIME NOT NULL,
      PRIMARY KEY(id)
    );";
  }
}


?>

