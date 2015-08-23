
<?php

class Router{

	private $session;
	private $controller;
	private $action;

	public function __construct($session, $urlParser){
		$this->session = $session; 
		$this->controller = ucfirst(strtolower($urlParser->getController()))."Controller"; 
		$this->action = $urlParser->getAction();
	} 

	public function run(){
		$error = false;
		$action = $this->action;
		if(class_exists($this->controller)){

			$controlObject = new $this->controller;
			if(method_exists($controlObject, $action)){
				$controlObject->$action($_GET);
			}else{
				$error = true;
			}
		}else{
			$error = true;
		}
		if($error){
			echo Render::view('errors/404.php');
		}
	}

	public static function act($session, $urlParser){
		$route = new self($session, $urlParser);
		$route->run();
	}
}

?>