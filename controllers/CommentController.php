<?php
class CommentController{
  private function authenticate(){
    return $_SESSION['auth'] == 'ON';
  }

  public function postSave($get, $post, $files){
    if(!$this->authenticate()){
      Redirect::to('auth/login');
    }

    if(isset($post['comment'])){
      $comment = new Comment($post['comment']);
      $comment->user_id = $_SESSION['session_user_id'];
      $comment->date_time = date('Y-m-d H:i:s');

      if($comment->save()){
        Redirect::to('post/index');
      }
    }

    echo 'error';
    die('asdf');
  }

  public function like($get){
    if(isset($get['comment_id'])){

      $comment = new Comment();
      $comment->find($get['comment_id']);

      if($comment->like($_SESSION['session_user_id'])){
      }
    }
    Redirect::to('post/index');
  }
 
  public function dislike($get){
    if(isset($get['comment_id'])){
      $comment = new Comment();
      $comment->find($get['comment_id']);
      if($comment->dislike($_SESSION['session_user_id'])){
      }
      Redirect::to('post/index');
    }
  }
}
?>
