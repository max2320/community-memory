<?php

class FrameworkController{
	public function install(){
		new Install($this->getModels());	
	}

	public function uninstall(){
		new Uninstall($this->getModels());	
	}
	
	public function reinstall(){
		$models = $this->getModels();
		new Uninstall($models);	
		new Install($models);	
	}
	
	private function getModels(){
		$models = [];
		$modelsDir = dir(dirname(__FILE__) . "/../model/");
		while (false !== ($modelClass = $modelsDir->read())) {
			if(strpos($modelClass, '.php')){	
				$class = str_replace('.php', '', $modelClass);
				array_push($models, $class);
			  echo "CREATED::" . $class . "<br>";
			}
		}
		$modelsDir->close();
		return $models;
	}
}
?>