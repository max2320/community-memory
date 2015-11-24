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

  public function likes(){
    return ResultSet::find('PostLikes',[
      'post_id'=> $this->_id,
    ]);
  }


  public function likeCount(){
    return count($this->likes());
  }
  
  public function comments(){
    return ResultSet::find('Comment',[
      'post_id'=> $this->_id,
    ]);
  }

  public function commentCount(){
    return count($this->comments());
  }

  public function userLike($user_id){
    $like = new PostLikes();
    $like->findByAttr([
      'post_id'=> $this->_id,
      'user_id'=>$user_id,
    ]);
    if($like->exists()){
      return $like;
    }
    return false;
  }

  public function like($user_id){
    $like = $this->userLike($user_id);
    if(!$like){
      $like = new PostLikes([
        'post_id'=> $this->_id,
        'user_id'=>$user_id,
        'date_time' => date('Y-m-d H:i:s'),
        'liked' => 1,
      ]);
      return $like->save();
    }
    return false;
  }
  public function dislike($user_id){
    $like = $this->userLike($user_id);
    if($like){
      return $like->delete();
    }
    return false;
  }
}



?>

