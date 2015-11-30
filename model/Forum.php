<?php
class Forum extends Model{

  public function tableName(){
    return 'forum';
  } 
  
  public function columns(){ 
    return [
      'id',
      'title',
      'content',  
      'user_id',
      'date_time',
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
    return "CREATE TABLE IF NOT EXISTS forum(
      id INTEGER NOT NULL AUTO_INCREMENT,
      user_id INTEGER NOT NULL REFERENCES users(id),
      title TEXT,
      content TEXT,
      date_time DATETIME NOT NULL,
      PRIMARY KEY(id)
    );";
  }

 
  public function comments(){
    return ResultSet::find('Comment',[
      'forum_id'=> $this->_id,
    ]);
  }

  public function commentCount(){
    return count($this->comments());
  }

?>