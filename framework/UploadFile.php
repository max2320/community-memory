<?php

class UploadFile{
	private $file;
	
	public function __construct($file){
		$this->file = $file;
		$this->fileName = date('U') . "_" . $file['name'];
	}

	public function save($path = "/"){
		return move_uploaded_file($this->getFileName() , $this->uploadPath() . $path);
	}
	private function uploadPath(){
		global $UPLOADS_PATH, $appPath;
		return $appPath . $UPLOADS_PATH;
	}
	public function getFileName(){
		return $this->fileName;		
	}
}
?>