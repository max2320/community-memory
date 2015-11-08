<?php
class AuthController{
	public function login(){
		echo Render::viewWithLayout();
	}

	public function postLogin($get, $post){
		print_r($get);
		print_r($post);
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
		$post['user']['token'] = $passwordToken;
		
		//build user
		$newUser = new User($post['user']);
		
		if($newUser->save()){
			// build registration mail
			$mailer = new Mailer('user_register', $newUser, $newUser->email, 'Resgistro de Usuário');
			// send mail
			if($mailer->deliver()){
				echo Render::viewWithLayout('/auth/registerMailDelivered',[
					'user' => $newUser,
				]);
			}
		}

		echo Render::viewWithLayout('auth/register', [
			'user' => $user
		]);
	}
	public function registerFinishRegister(){

		echo Render::viewWithLayout();
	}

	public function logout(){
		global $ROUTE_ROOT;
		session_destroy();
		Redirect::to($ROUTE_ROOT);
	}
}
?>