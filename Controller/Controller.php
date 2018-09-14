<?php

class Controller {
	private $model;

	public function construct($model){

		if($model != null){
			$this->model = $model;
		} else {
			this->model = new Model();
		}
	}
}

?>