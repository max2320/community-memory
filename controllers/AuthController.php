<?php
class AuthController{
	private function authenticate(){
		return $_SESSION['auth'] == 'ON';
	}

	public function login(){
		if($this->authenticate()){
			Redirect::to('post/index');
		}

		echo Render::viewWithLayout();
	}

	public function postLogin($get, $post){
		$error = '';

		if(isset($post['user'])){
			$user = new User;
			$user->findByAttr([
				'email' => $post['user']['email']
			]);
			
			if($user->exists()){
				if($user->password == sha1($post['user']['password'])){
					$_SESSION['auth'] = 'ON';
					$_SESSION['session_user'] = $user->name;
					$_SESSION['session_user_id'] = $user->_id;
					Redirect::to('post/index');
				}else{
					$error = 'Usuário e/ou senha não existentes';	
				}
			}else{
				$error = 'Usuário e/ou senha não existentes';
			}
		}

		echo Render::viewWithLayout('/auth/login',[
			'error' => $error
		]);
	}	

	public function register(){
		$user  = new User;

		echo Render::viewWithLayout('auth/register', [
			'user' => $user
		]);
	}

	public function postRegister($get, $post){
		$passwordToken = date('U');
		$passwordTokenEnc = sha1($passwordToken);

		$post['user']['birth_date'] = Date::formatToStore($post['user']['birth_date'], false);
		$post['user']['password'] = $passwordTokenEnc;
		$post['user']['status'] = 0;
		
		//build user
		$newUser = new User($post['user']);
		$newUser->token = $passwordToken;
		
		if($newUser->save()){
			// build registration mail
			$mailer = new Mailer('user_register', $newUser, $newUser->email, 'Resgistro de Usuário');
			// send mail
			if($mailer->deliver()){
				Redirect::to('auth/registerMailDelivered');
			}
		}

		echo Render::viewWithLayout('auth/register', [
			'user' => $user
		]);
	}

	public function registerMailDelivered(){
		echo Render::viewWithLayout('auth/register_mail_delivered');
	}

	public function finishRegister($get, $post){
		$token = $get['token'];

		$user = new User();
		$user->findByAttr([
			'password' => sha1($token),
		]);

		if(empty($user->name)){
			Redirect::to('auth/wrongToken');
		}

		echo Render::viewWithLayout('auth/finish_register',[
			'token'=> $token,
			'user'=> $user,
		]);
	}
	public function wrongToken(){
		echo Render::viewWithLayout('auth/wrong_token');
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