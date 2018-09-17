<?php 

class Home extends Controller {
      public function index($name = '') {
      	    $user = $this->model('User'); 
	    $user->name = $name;

	    $this->view('home/index', ['name' => $user->name]);
      }

      public function auth() {
      	    $user = $this->model('User');
	    $user->username = $_POST['username'];
	    $user->password = $_POST['password'];

	    if($user->authenticate()) {
	    	session_start();
	    	$_SESSION["username"] = $user->username;
		echo "user auth";
	    	$this->view('home/index', ['username' => $user->username]);
	    } else {
	      	$this->view('home/index', ['username' => $user->username]);
	    }
      }

      public function logout() {
      	    session_start();
	    // remove all session variables
	    session_unset();

	    // destroy the session
	    session_destroy();
	    $this->view('home/index', []);
      }
}