<?php

class UploadFile{
	private $file;
	
	public function __construct($file){
		$this->file = $file;
		print_r($this->file);
	}

	public function save($path = "/"){
		var_dump($this->getFileName() , $this->uploadPath() . $path);
		return move_uploaded_file($this->getTempName() , 
			$this->uploadPath() . $path . "/". $this->getFileName());
	}
	
	private function uploadPath(){
		global $UPLOADS_PATH, $appPath;
		return $appPath . $UPLOADS_PATH;
	}
	
	public function getFileName(){
		return date('U') . "_" . $this->file['name'];		
	}
	
	public function getTempName(){
		return $this->file['tmp_name'];
	}
}
?>