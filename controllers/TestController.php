<?php
class TestController{
	public function teste(){
		echo Render::viewWithLayout('errors/404',['message'=>'ff']);
	} 

	public function newpage(){
	}
}