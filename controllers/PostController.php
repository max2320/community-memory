<?php
class PostController{
  private function authenticate(){
    return $_SESSION['auth'] == 'ON';
  }

	public function index(){
    if(!$this->authenticate()){
      Redirect::to('auth/login');
    }

    $posts = ResultSet::find('Post',[
      'user_id'=>$_SESSION['session_user_id'],
    ], 'date_time DESC');


    echo Render::viewWithLayout('post/index',[
      'posts' => $posts,
    ]);
  }

  public function postSave($get, $post, $files){
    if(!$this->authenticate()){
      Redirect::to('auth/login');
    }
    if(isset($post['post'])){
      $post = new Post($post['post']);
      $post->user_id = $_SESSION['session_user_id'];
      $post->date_time = date('Y-m-d H:i:s');
      if(!empty($files)){
        $file = new UploadFile($files['post']['image']);
        
        if($file->save('/posts/images')){
          $post->image = $file->getFileName();
        }  
      }

      if($post->save()){
        Redirect::to('post/index');
      }
    }

    echo 'error';
    die('asdf');
  }
 
  public function like($get){
    if(isset($get['post_id'])){

      $post = new Post();
      $post->find($get['post_id']);

      if($post->like($_SESSION['session_user_id'])){
      }
    }
    Redirect::to('post/index');
  }
 
  public function dislike($get){
    if(isset($get['post_id'])){
      $post = new Post();
      $post->find($get['post_id']);
      if($post->dislike($_SESSION['session_user_id'])){
      }
        Redirect::to('post/index');
    }
  }
}
?>
