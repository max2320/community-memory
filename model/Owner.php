<?php
class Owner extends Model{
  public function tableName(){
    return 'owner';
  } 
  
  public function columns(){ 
    return [
      'name',
      'carrier_id', 
      'owner_id',
      'date_time',
      'confirmation',
    ];
  } 

  public function validators(){ 
  }
  
  public static function createTable(){
    return "CREATE TABLE IF NOT EXISTS owner(
      id INTEGER NOT NULL AUTO_INCREMENT,
      carrier_id INTEGER NOT NULL REFERENCES user(id),
      owner_id INTEGER NOT NULL REFERENCES user(id),
      date_time DATETIME NOT NULL,
      confirmation INTEGER NOT NULL DEFAULT 0,
      PRIMARY KEY(id)
    );";
  }
}


?>
