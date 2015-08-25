<?php

class UrlParser{

	private $uri;

	private $controller = "";
	private $action = "";
	
	public function __construct(){
		$this->uri = $_SERVER['REQUEST_URI'];
		$this->parse();
	}

	public function method(){
		return strtolower($_SERVER['REQUEST_METHOD']);
	}
	public function parse(){
		$uri = explode("/", $this->uri);
		if(isset($uri[1])){
			$this->controller = strtolower($uri[1]);
		}
		if(isset($uri[2])){
			$this->action = strtolower($uri[2]);
		}
	}

	public function getController(){
		return $this->controller;
	}

	public function getAction(){
		return $this->action;
	}
	
	public function urlToArr(){
		return [
			'controller' => $this->getController(),
			'action' => $this->getAction(),
 		];
	}

	public function urlToPath(){
		return $this->getController() . "/" . $this->getAction();
	}

}
?>