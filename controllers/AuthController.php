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
		$post['user']['birth_date'] = Date::formatToStore($post['user']['birth_date'], false);
		$post['user']['password'] = date('U');
		$post['user']['status'] = 0;
		
		
		$newUser = new User($post['user']);
		
		var_dump($newUser->save());

		echo Render::viewWithLayout('/auth/register',[
			'user' => $newUser,
		]);

		// Redirect::to('auth/registerStep1');

	}
	public function registerStep1(){
		echo Render::viewWithLayout();
	}

	public function logout(){
		global $ROUTE_ROOT;
		session_destroy();
		Redirect::to($ROUTE_ROOT);
	}
}
?>