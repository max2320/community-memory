<?php
class CommentLikes extends Model{

  public function tableName(){
    return 'comment_likes';
  } 
  
  public function columns(){ 
    return [
      'id',
      'user_id',
      'comment_id',
      'liked',
      'date_time',
    ];
  } 

  public function validators(){ 
    return [];
  }
  
  public static function createTable(){
    return "CREATE TABLE IF NOT EXISTS comment_likes(
      id INTEGER NOT NULL AUTO_INCREMENT,
      user_id INTEGER NOT NULL REFERENCES users(id),
      comment_id INTEGER NOT NULL REFERENCES post(id),
      liked INTEGER NOT NULL DEFAULT 0,
      date_time DATETIME NOT NULL,
      PRIMARY KEY(id)
    );";
  }
}



?>

