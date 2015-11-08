<?php
class Profile extends Model{

  public $token;
  
  public function tableName(){
    return 'profile';
  } 
  
  public function columns(){ 
    return [
      'name',
      'photo', 
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
    return "CREATE TABLE IF NOT EXISTS profile(
      id INTEGER NOT NULL AUTO_INCREMENT,
      user_id INTEGER NOT NULL REFERENCES user(id),
      name VARCHAR(255) NOT NULL,
      photo TEXT NOT NULL,
      PRIMARY KEY(id)
    );";
  }
}


?>
