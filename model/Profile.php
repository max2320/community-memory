<?php
class Profile extends Model{
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

  public function user(){
    $user = new User();
    $user->find($this->user_id);
    return $user;
  }

  public function getUserName(){
    return $this->user()->attr('name');
  }

  public function getUserBirthDate(){
    return Date::formatToShow($this->user()->attr('birth_date'));
  }

  public function friends(){
    return ResultSet::find('Friend',[
      'user_id'=>$this->user_id,
    ]);
  }

  public function owner(){
    return ResultSet::find('Owner',[
      'carrier_id'=>$this->user_id,
    ]);
  }
 
  public function carriers(){
    return ResultSet::find('Owner',[
      'owner_id'=>$this->user_id,
    ]);
  }
 
  public function posts(){
    return ResultSet::find('Post',[
      'user_id'=>$this->user_id,
    ]);  
  }

  public function canFriend($friend_id){
    $friend = new Friend();
    $friend->findByAttr([
      'user_id' => $this->user_id,
      'friend_id' => $friend_id
    ]);
    return $friend->exists();
  }
}


?>
