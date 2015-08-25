<?php
class AuthController{
	public function login(){
		echo Render::viewWithLayout();
	}

	public function postLogin(){
		echo 'post';
	}
	

	public function register(){
		echo Render::viewWithLayout();
	}

	public function logout(){
		global $ROUTE_ROOT;
		session_destroy();
		Redirect::to($ROUTE_ROOT);
	}
}
?>