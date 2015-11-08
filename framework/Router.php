
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

	private function formatFiles(){
		$files = [];

		if(!empty($_FILES)){
			foreach($_FILES as $key => $attrs){
				$files_key = [];
				
				foreach($attrs['name'] as $field => $data){
					$files_key[$field] = [
						'name' => $attrs['name'][$field],
            'type' => $attrs['type'][$field],
            'tmp_name' => $attrs['tmp_name'][$field],
            'error' => $attrs['error'][$field],
            'size' => $attrs['size'][$field],
					];
				}

				$files[$key] = $files_key;
			}
		}	

		return $files;
	}

	public function run(){
		$error = false;
		$action = $this->method.ucfirst($this->action);

		if(class_exists($this->controller)){
			$controlObject = new $this->controller;

			if(method_exists($controlObject, $action)){
				$controlObject->$action($_GET, $_POST, $this->formatFiles());
			}else{
				$action = $this->action;
				
				if(method_exists($controlObject, $action)){
					$controlObject->$action($_GET, $_POST, $this->formatFiles());
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