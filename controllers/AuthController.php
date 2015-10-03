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
		echo Render::viewWithLayout();
	}

	public function postRegister($get, $post){
		print_r($post);

		$newUser = new User();
		$newUser->create([
			'name' => $post['name'],
			'birth_date'=> Date::formatToStore($post['birth_date']),
			'user'=> $post['email']
		]);


		Redirect::to('auth/registerStep1');

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