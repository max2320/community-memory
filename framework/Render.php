<?php
class Render{
	public static function view($file = null, $params = []){
		global $appPath;
		$viewPath = $appPath . "view/";
		if(!$file){
			$urlParser = new UrlParser();
			$file = $urlParser->urlToPath();
		}
    
		$file = $viewPath . $file . ".php";

		if(!is_file($file)){
			$file = $viewPath . "errors/404.php";
		}
		
    ob_start();
    ob_implicit_flush(false);
    extract($params, EXTR_OVERWRITE);
    require($file);
    return ob_get_clean();
	}
	public static function viewWithLayout($view = null, $params = []){
		return self::view('layouts/main',array(
			'content' => self::view($view,$params)
		));
	}
}

?>