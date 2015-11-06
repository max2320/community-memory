<?php
class User extends Model{

  public function tableName(){
    return 'user';
  } 
  
  public function columns(){ 
    return [
      'name',
      'birth_date', 
      'email', 
      'password', 
      'status'
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
    return "CREATE TABLE user(
      id INTEGER NOT NULL AUTO_INCREMENT,
      name VARCHAR(255) NOT NULL,
      birth_date DATE NOT NULL,
      email VARCHAR(255) NOT NULL,
      password VARCHAR(255) NOT NULL,
      status INTEGER NOT NULL,
      PRIMARY KEY(id)
    );";
  }
}


?>
