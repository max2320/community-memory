
<?php

class Router{

	private $session;
	private $controller;
	private $action;
	private $method;

	public function __construct($session, $urlParser){
		global $ROUTE_ROOT;

		$this->session = $session; 
		$this->controller = ucfirst(strtolower($urlParser->getController()))."Controller"; 
		$this->action = $urlParser->getAction();
		$this->method = $urlParser->method();
		if(empty($urlParser->getController())){
			Redirect::to($ROUTE_ROOT);
		}
	} 

	public function run(){
		$error = false;
		$action = $this->method.ucfirst($this->action);
		if(class_exists($this->controller)){
			$controlObject = new $this->controller;
			if(method_exists($controlObject, $action)){
				$controlObject->$action($_GET, $_POST);
			}else{
				$action = $this->action;
				if(method_exists($controlObject, $action)){
					$controlObject->$action($_GET, $_POST);
				}else{
					$error = true;
				}
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