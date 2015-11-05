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

		

		echo Render::viewWithLayout();
	}

	public function postRegister($get, $post){

		$post['user']['birth_date'] = Date::formatToStore($post['user']['birth_date']);
		var_dump($post['user']);
		
		$newUser = new User($post['user']);
		
		print_r($newUser);
		// echo Render::viewWithLayout('/auth/register');

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