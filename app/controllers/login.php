<?php 

class Login extends Controller {
      public function index($name = '') {
      	    $user = $this->model('User'); 
	    $user->name = $name;

	    $this->view('login/index', ['name' => $user->name]);
      }

      public function auth() {
      	    $user = $this->model('User');
	    $user->username = $_POST['username'];
	    $user->password = $_POST['password'];

	    if($user->authenticate()) {
	    	session_start();
	    	$_SESSION["username"] = "a";
		echo "user auth";
	    	$this->view('home/index', ['username' => $user->username]);
	    } else {
	      	$this->view('login/index', ['username' => $user->username]);
	    }
      }
}