<?php
class ProfileController{
	private function authenticate(){
		return $_SESSION['auth'] == 'ON';
	}

	public function show(){
		$profile = new Profile();
		$profile->find($_SESSION['session_user_id']);

		$f = ResultSet::find('User',[
			'email'=>'anderson2320@gmail.com',
		]);
		print_r($f);


		echo Render::viewWithLayout('profile/show',[
			'profile' => $profile
		]);
	}
	


	public function registerMailDelivered(){
		echo Render::viewWithLayout('auth/register_mail_delivered');
	}

	public function finishRegister($get, $post){
	}

	public function wrongToken(){
	}
	
	public function postFinishRegister($get, $post, $files){
		$error = '';

		$token = $post['user']['token'];
		$user = new User();
		$user->findByAttr([
			'password' => sha1($token),
		]);
		

		if(empty($user->name)){
			Redirect::to('auth/wrongToken');
		}

		if(isset($post['user']) && isset($files['profile'])){
			if($post['user']['password'] == $post['user']['confirm_password'] ){

				if(isset($files['profile']['photo'])){
					$file = new UploadFile($files['profile']['photo']);
					if($file->save('/profiles/photos')){
						$profile = new Profile([
							'name' => $user->name,
							'photo' => $file->getFileName(),
							'user_id' => $user->id,
						]);
						
						$user->password = sha1($post['user']['password']);
						$user->status = 1;

						if($user->save() && $profile->save()){
							Redirect::to('auth/finished');
						}
					}
				}
			}else{
				$error = 'Senhas não conferem';
			}
		}

		echo Render::viewWithLayout('auth/finish_register',[
			'error'=>$error,
			'token'=> $token,
			'user'=> $user,
		]);
	}

	public function finished(){
		echo Render::viewWithLayout();
	}

	public function logout(){
		global $ROUTE_ROOT;
		session_destroy();
		Redirect::to($ROUTE_ROOT);
	}
}
?>
