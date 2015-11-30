<?php
class Friend extends Model{
  public function tableName(){
    return 'friend';
  } 
  
  public function columns(){ 
    return [
      'user_id', 
      'friend_id',
      'date_time',
      'confirmation',
    ];
  } 

  public function validators(){ 
  }
  
  public static function createTable(){
    return "CREATE TABLE IF NOT EXISTS friend(
      id INTEGER NOT NULL AUTO_INCREMENT,
      user_id INTEGER NOT NULL REFERENCES user(id),
      friend_id INTEGER NOT NULL REFERENCES user(id),
      date_time DATETIME NOT NULL,
      confirmation INTEGER NOT NULL DEFAULT 0,
      PRIMARY KEY(id)
    );";
  }
}


?>
