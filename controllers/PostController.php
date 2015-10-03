<?php
class PostController{
	public function index(){
		$model = $this->loadModel();
		echo Render::viewWithLayout(null,[
			'list' => $model->model->select('*', '')
		]);
	}

	private function loadModel(){
		return new Post();
	}
}
?>