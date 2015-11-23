<?php
class PostController{
  private function authenticate(){
    return $_SESSION['auth'] == 'ON';
  }

	public function index(){
    if(!$this->authenticate()){
      Redirect::to('auth/login');
    }

    $posts = ResultSet::find('Comments',[
      'user_id'=>$_SESSION['session_user_id'],
    ], 'date_time DESC');


    echo Render::viewWithLayout('comments/index',[
      'comments' => $comments,
    ]);
  }

  public function commentsSave($get, $comments, $files){
    if(!$this->authenticate()){
      Redirect::to('auth/login');
    }
    if(isset($comments['comments'])){
      $comments = new Comments($comments['comments']);
      $comments->user_id = $_SESSION['session_user_id'];
      $comments->date_time = date('Y-m-d H:i:s');
      if(!empty($files)){
        $file = new UploadFile($files['comments']['image']);
        
        if($file->save('/posts/images')){
          $comments->image = $file->getFileName();
        }  
      }

      if($comments->save()){
        Redirect::to('comments/index');
      }
    }

    echo 'error';
    die('asdf');
  }
}
?>
