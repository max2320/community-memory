<?php
class ForumController{
  private function authenticate(){
    return $_SESSION['auth'] == 'ON';
  }

	public function index(){
    if(!$this->authenticate()){
      Redirect::to('auth/login');
    }

    $forums = ResultSet::find('Forum',[
      'user_id'=>$_SESSION['session_user_id'],
    ], 'date_time DESC');


    echo Render::viewWithLayout('forum/index',[
      'forums' => $forums,
    ]);
  }

  public function forumSave($get, $forum, $files){
    if(!$this->authenticate()){
      Redirect::to('auth/login');
    }
    if(isset($forum['forum'])){
      $forum = new Forum($forum['forum']);
      $forum->user_id = $_SESSION['session_user_id'];
      $forum->date_time = date('Y-m-d H:i:s');
      
      if($forum->save()){
        Redirect::to('forum/index');
      }
    }

    echo 'error';
    die('asdf');
  }
 
}
?>
