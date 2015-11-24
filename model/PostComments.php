<?php
class PostComments extends Model{

  public function tableName(){
    return 'post_comments';
  } 
  
  public function columns(){ 
    return [
      'id',
      'user_id',
      'post_id',
      'content',
      'date_time',
    ];
  } 

  public function validators(){ 
    return [];
  }
  
  public static function createTable(){
    return "CREATE TABLE IF NOT EXISTS post_comments(
      id INTEGER NOT NULL AUTO_INCREMENT,
      user_id INTEGER NOT NULL REFERENCES users(id),
      post_id INTEGER NOT NULL REFERENCES post(id),
      content TEXT NOT NULL,
      date_time DATETIME NOT NULL,
      PRIMARY KEY(id)
    );";
  }
}



?>

