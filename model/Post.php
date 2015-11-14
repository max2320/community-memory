<?php
class Post extends Model{

  public $token;
  
  public function tableName(){
    return 'post';
  } 
  
  public function columns(){ 
    return [
      'id',
      'content', 
      'image', 
      'likes', 
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
      content TEXT NOT NULL,
      image VARCHAR(255) NOT NULL,
      likes INTEGER NOT NULL,
      PRIMARY KEY(id)
    );";
  }
}


?>

