<?php 

class Register extends Controller {
      public function index($name = '') {
      	    $user = $this->model('User'); 
	    $user->name = $name;

	    $this->view('register/index', ['name' => $user->name]);
      }
}