<?php

class UploadFile{
	private $file;
	
	public function __construct($file){
		$this->file = $file;
		$this->hash = md5(date('U'));
	}

	public function save($path = "/"){
		return move_uploaded_file($this->getTempName() , 
			$this->uploadPath() . $path . "/". $this->getFileName());
	}
	
	private function uploadPath(){
		global $UPLOADS_PATH, $appPath;
		return $appPath . $UPLOADS_PATH;
	}
	
	public function getFileName(){
		return $this->hash . "_" . $this->file['name'];		
	}
	
	public function getTempName(){
		return $this->file['tmp_name'];
	}
}
?>