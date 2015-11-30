<?php
class ProfileController{
	private function authenticate(){
		return $_SESSION['auth'] == 'ON';
	}

	public function show($get){
    if(!$this->authenticate()){
      Redirect::to('auth/login');
    }

		$profile = new Profile();
		if(isset($get['id'])){
			$profile->find($get['id']);
		}else{
			$profile->findByAttr(['user_id' => $_SESSION['session_user_id'] ]);
		}

		$f = ResultSet::find('User',[
			'email'=>'anderson2320@gmail.com',
		]);

		echo Render::viewWithLayout('profile/show',[
			'profile' => $profile
		]);
	}

	public function friend($get){
		
	}	
	
	public function unfriend($get){
		
	}	

}
?>
