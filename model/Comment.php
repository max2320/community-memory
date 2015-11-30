<?php
class Comment extends Model{

  public function tableName(){
    return 'comment';
  } 
  
  public function columns(){ 
    return [
      'id',
      'content',  
      'likes', 
      'user_id',
      'post_id',
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
    return "CREATE TABLE comment(
      id INTEGER NOT NULL AUTO_INCREMENT,
      post_id INTEGER NOT NULL REFERENCES posts(id),
      user_id INTEGER NOT NULL REFERENCES users(id),
      content TEXT,
      likes INTEGER NOT NULL DEFAULT 0,
      date_time DATETIME NOT NULL,
      PRIMARY KEY(id)
    );";
  }



  public function likeCount(){
    return count(ResultSet::find('CommentLikes',[
      'comment_id'=> $this->_id,
    ]));
  }

  public function userLike($user_id){
    $like = new CommentLikes();
    $like->findByAttr([
      'comment_id'=> $this->_id,
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
      $like = new CommentLikes([
        'comment_id'=> $this->_id,
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
